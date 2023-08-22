<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\CustomerUser;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function create()
    {
        return view('frontend.pages.customers.register');
    }
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:6',
        ]);
        if ($validation->fails()) {
            Toastr::error('Please fill up the form correctly', 'Error');
            return redirect()->back();
        }
        CustomerUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        Toastr::success('Registration Successfully', 'Success');
        return to_route('userCustomer.login');

    }
    public function customerLogin()
    {
        return view('frontend.pages.customers.login');
    }
    public function customerDoLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6',
        ]);
        $creadentials = $request->only('email', 'password');
        $user = auth()->guard('customers')->attempt($creadentials);
        if ($user) {
            Toastr::success('Login Successfully', 'Success');
            return redirect()->route('frontend.home');
        } else {
            Toastr::error('Invalid email or password', 'Error');
            return redirect()->back();
        }
    }
    public function logout()
    {
        auth()->guard('customers')->logout();
        Toastr::success('Logout Successfully', 'Success');
        return redirect()->route('frontend.home');
    }
}
