<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Admin;
use App\Models\Branch;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BranchRequest;
use App\Repositories\Interface\BranchInterface;
use Illuminate\Support\Facades\Hash;

class BranchController extends Controller
{
    protected $branch;
    public function __construct(BranchInterface $branch)
    {
        $this->branch = $branch;
    }

    public function index()
    {
        $data = [];
        $data['branches'] = $this->branch->all();
        return view('admin.branch.index',$data);
    }
    public function create()
    {
        return view('admin.branch.create');
    }

    public function store(BranchRequest $request)
    {
        try {
            $existingAdmin = Admin::where('name', $request->name)->first();
            if ($existingAdmin) {
                return back()->with('error', 'Name already exists! Please choose a different name.');
            }

            $this->branch->store($request->all());

            return redirect()->route('admin.branch.index')->with('success', 'Branch Created Successfully');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function edit($id){
        try{
            $data=[];
            $data['branch']=$this->branch->get($id);
            return view ('admin.branch.edit',$data);
        }catch (Exception $e){
           return back()->with('error','Sorry Something went wrong');
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:65',
            'email' => 'required|string|max:65|unique:branches,email,'.$id,
            'phone' => 'required|digits:11|unique:branches,phone,'.$id,
            //'password' => 'required|min:8|max:15',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
            'fathers_name' => 'required|string|max:65',
            'mothers_name' => 'required|string|max:65',
            'nationality' => 'required|string|max:65',
            'gender' => 'required|string|max:65',
            'religion' => 'required|string|max:65',
            'division_id' => 'required',
            'district_id' => 'required',
            'upazilla_id' => 'required',
            'post_office' => 'required|string|max:65',
            'address' => 'required|string|max:65',
            'institute_name_en' => 'required|string|max:65',
            'institute_name_bn' => 'required|string|max:65',
            'institute_age' => 'required|max:65',
            'facebook_link' => 'nullable|max:250',
            'youtube_link' => 'nullable|max:250',
            'institute_division' => 'required',
            'institute_district' => 'required',
            'institute_upazilla' => 'required',
            'institute_post_code' => 'required|string|max:65',
            'institute_address' => 'required|string|max:150',
            'nid_card_img' => 'nullable|image|mimes:jpeg,png,jpg',
            'trade_licence_img' => 'nullable|image|mimes:jpeg,png,jpg',
            'signature_img' => 'nullable|image|mimes:jpeg,png,jpg|dimensions:width=80,height=40',
        ]);
        try {

            $branch = Branch::findOrFail($id);
            $existingAdmin = Admin::where('name', $request->name)->first();
            if ($existingAdmin) {
                if ($branch->admin_id != $existingAdmin->id) {
                    return back()->with('error', 'Name already exists! Please choose a different name.');
                }
            }


            $this->branch->update($request->all(), $id);

            return redirect()->back()->with('success', 'Branch updated Successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Sorry, something went wrong');
        }
    }
    public function show($id){
        try{
            $data=[];
            $data['branch']=$this->branch->get($id);
            return view('admin.branch.show',$data);
        }catch(Exception $e){
            return back()->with('error','Sorry Something went wrong');
        }
    }
    public function delete($id)
    {
        try {

            $students=Student::all();
            foreach($students as $student){
                if($student->branch_id==$id){
                    return redirect()->back()->with('error','Branch has dependencies and cannot be deleted');
                }
            }
            $this->branch->delete($id);
            return redirect()->back()->with('success','Branch Deleted Successfully');
        }catch (Exception $e){
            return redirect()->back()->with('error','Sorry Something went to wrong');
        }

    }
    public function statusChange($id)
     {
        try{
            $branch = Branch::find($id);
            if ($branch) {
                $branch->status = $branch->status ? 0 : 1;
                $branch->save();
            }
            return redirect()->back()->with('success','Status Update Successfully');
        }catch(Extension $e){
            return response()->with('error','Sorry Something Went to Wrong');
        }
    }

    public function questionMakePermission($id)
     {
        try{
            $branch = Branch::find($id);
            if ($branch) {
                $branch->question_make_permission = $branch->question_make_permission ? 0 : 1;
                $branch->save();
                $admin_permission = Admin::where('id', $branch->admin_id)->first();
                $admin_permission->question_make_permission = $branch->question_make_permission;
                $admin_permission->save();
            }

            return redirect()->back()->with('success','Permission Updated Successfully');
        }catch(Extension $e){
            return response()->with('error','Sorry Something Went to Wrong');
        }
    }

    public function change_password(Request $request){
        //dd($request);
        $admin_id=$request->admin_id;
        if($admin_id){
          $admin=Admin::where('id',$admin_id)->first();
          $admin->password=Hash::make($request->password);
          $admin->save();
          return redirect()->back()->with('success','Branch Password Update Successfully');
        }
    }
}
