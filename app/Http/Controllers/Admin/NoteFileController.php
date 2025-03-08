<?php

namespace App\Http\Controllers\admin;

use Exception;
use ZipArchive;
use App\Models\NoteFile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class NoteFileController extends Controller
{
    public function index()
    {
        $data['files'] = NoteFile::where('branch_id', 1)->get();
        return view('admin.noteFile.index', $data);
    }
    public function branchfile()
    {
        if(Auth::user()->branch_id==1){
            $data['files'] = NoteFile::latest()->get();
        }else{
            $data['files'] = NoteFile::where('branch_id', Auth::user()->branch_id)->latest()->get();
        }
        return view('admin.noteFile.branchfile', $data);
    }
    public function create()
    {

        return view('admin.noteFile.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'description' => 'required|max:400',
            'file' => 'required',
            'date' => 'required',
        ]);
        try {
            $fileadd = "";
            if ($request->file('file')) {
                $fileadd = time() . '.' . $request->file->getclientOriginalExtension();
                $request->file->move(public_path('backend/file/filenote/'), $fileadd);
                $fileadd = "backend/file/filenote/" . $fileadd;
            }

            $file = new NoteFile();
            $file->title = $request->title;
            $file->date = $request->date;
            $file->description = $request->description;
            $file->file = $fileadd;
            $file->branch_id = Auth::user()->branch_id;
            $file->save();
            return back()->with('success', 'File Upload Successfully');
        } catch (Exception $e) {
            return back()->with('error', 'Something went to Wrong');
        }
    }

    public function download($id)
    {
        $file = NoteFile::find($id);
        if ($file) {
            $filePath = $file->file;
            $zipFileName = time() . 'file.zip';
            $zipFilePath = public_path($zipFileName);
            $zip = new ZipArchive;
            if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
                $file = new \SplFileInfo($filePath);

                if ($file->isFile()) {
                    $relativeName = basename($filePath);
                    $zip->addFile($filePath, $relativeName);
                }

                $zip->close();
            }
            return response()->download($zipFilePath);
        }
    }

    public function destroy($id){
        $file = NoteFile::find($id);
        $fileName = $file->file;
        //dd( $fileName);
        $removefile = public_path($fileName);
        File::delete($removefile);
        $file->delete();

        return back()->with('success', 'File delete Successfully');
    }
}
