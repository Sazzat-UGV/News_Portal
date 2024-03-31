<?php

namespace App\Http\Controllers\backend\auth;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginPage()
    {
        return view('backend.pages.auth.login_page');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials, $request->filled('remember_me'))) {
            return redirect()->route('admin.dashboard');
        }
        Toastr::error('You are not a valid user!');
        return back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.loginPage');
    }
}
