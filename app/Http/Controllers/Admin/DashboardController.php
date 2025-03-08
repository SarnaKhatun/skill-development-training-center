<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Branch;
use App\Models\Setting;
use App\Models\Student;
use App\Models\Register;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $branch_id=Auth::user()->branch_id;
        $data['branch']=Branch::where('id',$branch_id)->first();
        $student = DB::table('students')->select(DB::raw('count(*) as total_std'));
        if ($branch_id == 1) {
            $data['student'] = $student->first();
        } else {
            $data['student'] = $student->where('created_by', $branch_id)->first();
        }
        
         $successstd_Count = DB::table('students')->where('job_status',1)->select(DB::raw('count(*) as success_std'));
        if ($branch_id == 1) {
            $data['success_std_Count'] = $successstd_Count->first();
        } else {
            $data['success_std_Count'] = $successstd_Count->where('created_by', $branch_id)->first();
        }

        $amount = DB::table('students')->select(DB::raw('sum(payable_amount) as payable_amount'));
        $data['amount'] = $amount->where('created_by', $branch_id)->first();

        $Collectamount = DB::table('students')->select(DB::raw('sum(paid) as paid'));
        $data['collect_money'] = $Collectamount->where('created_by', $branch_id)->first();

        $Accountamount = DB::table('branches')->select(DB::raw('sum(registration_balance) as balance'));
        $data['account_balance'] = $Accountamount->where('id', $branch_id)->first();

        $registerQuery = DB::table('registers')->selectRaw('count(*) as total_register');
        if ($branch_id == 1) {
            $data['register'] = $registerQuery->first();
        } else {
            $data['register'] = $registerQuery->where('branch_id', $branch_id)->first();
        }

        $certifiedQuery = DB::table('results')->selectRaw('count(*) as total_certified')->where('certified',1);
        if ($branch_id == 1) {
            $data['certified'] = $certifiedQuery->first();
        } else {
            $data['certified'] = $certifiedQuery->where('branch_id', $branch_id)->first();
        }
        $data['nearequest']= DB::table('near_by_requests')->selectRaw('count(*) as nearby')->where('branch_id',Auth::user()->branch_id)->first();
        return view('admin.dashboard',$data);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
    public function Password_page()
    {
        $user=Admin::where('id',Auth::user()->id)->first();
        return view('admin.auth.password',compact('user'));
    }
    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|min:8|max:12',
        ]);
        $user = Admin::find($id);
        if (Hash::check($request->old_password, $user->password)) {
            if ($request->old_password === $request->password) {
                return back()->with('error', 'Sorry, the new password cannot be the same as the old password.');
            } else {
                $user->password = Hash::make($request->password);
                $user->save();
                return back()->with('success', 'Password updated successfully.');
            }
        } else {
            return back()->with('error', 'Sorry, the old password is incorrect.');
        }
    }
}