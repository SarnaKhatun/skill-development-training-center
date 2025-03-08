<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use \App\Repositories\Interface\GalleryInterface;
use Exception;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    protected  $gallery;
    public function __construct(GalleryInterface $gallery)
    {
        $this->gallery = $gallery;
    }
    public function index()
    {
        $data['galaries'] = $this->gallery->all();
        return view('admin.gallery.index',$data);
    }
    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        try {
            $this->gallery->store($request->all());
            return response()->json([
                'success' => 'File Uploaded Successfully'
            ]);
        }catch (Exception $e){
            return response()->json([
                'error' => 'Sorry Something went to wrong'
            ]);
        }

    }

    public function delete($id)
    {
        try {
            $this->gallery->delete($id);
            return back()->with('success','File Deleted Successfully');
        }catch (Exception $e){
            return back()->with('error','Sorry Something went to wrong');
        }

    }
}
