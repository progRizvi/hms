<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login()
    {
        return view('backend.pages.login');
    }

    public function dologin(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if ($validation->fails()) {
            foreach ($validation->errors()->all() as $error) {
                toastr()->error($error);
                return redirect()->back();
            }
            return redirect()->back();
        }
        $credentials = $request->except('_token');

        if (auth()->attempt($credentials)) {
            toastr()->success('Login success');
            return redirect()->route('admin.dashboard');
        } else {
            toastr()->error('Login failed');
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        if (!Auth::guard('web')->check()) {
            toastr()->success('Logout success');
            return redirect()->route('login');
        }
    }

}
