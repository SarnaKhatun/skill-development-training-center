<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function checkLogin(Request $request){

        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:5|max:30',
        ],[
            'email.exists' => 'This email is not exists on admin table',
        ]);

        $check = $request->only('email', 'password');

        if(Auth::guard('admin')->attempt($check)){
             $admin = Auth::guard('admin')->user();
            //  if($admin->role == 3){
            //     Auth::guard('admin')->logout();
            //     return redirect()->route('admin.login')->with('error', 'Incorrect Credentials');
            // }
            if ($admin->status == 1) {
                return redirect()->route('admin.dashboard')->with('success', 'Welcome To Dashboard');
            } else {
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login')->with('error', 'Account is inactive');
            }
        }else{
            return redirect()->route('admin.login')->with('fail','Incorrect Credentials');
        }
    }
}