<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        return view('backend.pages.login');
    }

    public function dologin(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',

        ]);

// dd($request);

        $credentials = $request->except('_token');

// dd($credentials);

        if (auth()->attempt($credentials)) {
            return redirect()->route('frontend.home')->with('msg', 'login success');
        } else {
            return redirect()->back()->withErrors(['Invalid login info']);
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('admin.logout')->with('msg', 'Logout success');

    }

}
