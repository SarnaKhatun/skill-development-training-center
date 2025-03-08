<?php

namespace App\Repositories;

use App\Models\Admin;
use App\Traits\Uploadable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Interface\StaffInterface;

class StaffRepositories implements StaffInterface
{
    use Uploadable;
    public function all()
    {
        if (Auth::guard('admin')->user()->branch_id == 1) {
            return Admin::where('role', 3)->orderBy('id', 'desc')->get();
        } else {
            $branch_id = Auth::guard('admin')->user()->branch_id;
            return Admin::where('role', 3)->where('branch_id', $branch_id)->orderBy('id', 'desc')->get();
        }
    }
    public function store(array $data)
    {
        $filename = "";
        if (array_key_exists('image', $data)) {
            $filename = $this->uploadOne($data['image'], 400, 300, 'backend/images/user/', true);
        }
        $staff = new Admin();
        $staff->name = $data['name'];
        $staff->branch_id = Auth::guard('admin')->user()->branch_id;
        $staff->email  = $data['email'];
        $staff->phone   = $data['phone'];
        $staff->password  = Hash::make($data['password']);
        $staff->status  = $data['status'];
        $staff->image = $filename;
        $staff->role = 3;
        $staff->save();
    }

    public function get($id)
    {
        if (Auth::guard('admin')->user()->role == '1') {
            return Admin::where('id', $id)->first();
        } else {
            $branch_id = Auth::guard('admin')->user()->branch_id;
            return Admin::where('branch_id', $branch_id)->where('role', 3)->where('id', $id)->first();
        }
    }

    public function update(array $data, $id)
    {

        $staff =  Admin::find($id);
        $filename = "";
        if (array_key_exists('image', $data)) {
            $this->deleteOne($staff->image);
            $filename = $this->uploadOne($data['image'], 400, 300, 'backend/images/user/', true);
        } else {
            $filename = $staff->image;
        }
        $staff->name = $data['name'];
        $staff->email  = $data['email'];
        $staff->phone  = $data['phone'];
        $staff->status  = $staff->status;
        $staff->password  = Hash::make($data['password']);
        $staff->image = $filename;
        $staff->role = 3;
        $staff->save();
    }

    public function delete($id)
    {
        $staff =  Admin::find($id);
        if (!empty($staff)) {
            $this->deleteOne($staff->image);
            $staff->delete();
        }
    }

    public function statusChange(array $data)
    {
        $staff = Admin::find($data['id']);
        if ($staff) {
            $staff->status = $staff->status ? 0 : 1;
            $staff->save();
        }
    }
}