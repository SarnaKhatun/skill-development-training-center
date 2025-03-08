<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('phone', 'password');

        if (Auth::guard('student')->attempt($credentials)) {
            return redirect()->route('dashboard')->with('success', 'Welcome to Dashboard');
        } else {
            return redirect()->back()->with('error', 'Incorrect Credentials');
        }
    }
}