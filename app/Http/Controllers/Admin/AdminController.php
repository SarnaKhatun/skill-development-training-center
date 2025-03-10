<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StaffRequest;
use App\Models\Admin;
use App\Repositories\Interface\StaffInterface;
use Exception;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $staff;
    public function __construct(StaffInterface $staff)
    {
        $this->staff = $staff;
    }
    public function index()
    {
        $data = [];
        $data['staffs'] = $this->staff->all();
        return view('admin.user.index', $data);
    }
    public function create()
    {
        return view('admin.user.create');
    }
    public function store(StaffRequest $request)
    {
        try {
            $this->staff->store($request->all());
            return redirect()->route('admin.staff.index')->with('success', 'Teacher Created Successfully');
        } catch (Exception $e) {
            return back()->with('error', 'Something went to wrong');
        }
    }

    public function edit($id)
    {
        try {
            $data = [];
            $data['staff'] = $this->staff->get($id);
            return view('admin.user.edit', $data);
        } catch (Exception $e) {
            return back()->with('error', 'Sorry Something went to wrong');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:65',
            'email' => 'required|string|max:65|unique:admins,email,' . $id,
            'phone' => 'required|digits:11|unique:admins,phone,' . $id,
        ]);
        try {
            $this->staff->update($request->all(), $id);
            return redirect()->route('admin.staff.index')->with('success', 'Teacher updated Successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Sorry Something went to wrong');
        }
    }
    public function delete($id)
    {
        try {
            $this->staff->delete($id);
            return redirect()->back()->with('success', 'Teacher Deleted Successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Sorry Something went to wrong');
        }
    }
    public function statusChange($id)
    {
         try{
            $admin = Admin::find($id);
            if ($admin) {
                $admin->status = $admin->status ? 0 : 1;
                $admin->save();
            }
            return redirect()->back()->with('success','Status Update Successfully');
        }catch(Extension $e){
            return response()->with('error','Sorry Something Went to Wrong');
        }
    }


    public function questionMakePermission($id)
    {
        try{
            $user = Admin::find($id);
            if ($user) {
                $user->question_make_permission = $user->question_make_permission ? 0 : 1;
                $user->save();

            }

            return redirect()->back()->with('success','Permission Updated Successfully');
        }catch(Extension $e){
            return response()->with('error','Sorry Something Went to Wrong');
        }
    }
}
