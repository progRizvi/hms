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
            foreach ($validation->messages()->all() as $messages) {
                Toastr::error($messages);
            }
            return redirect()->back();
        }
        CustomerUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        Toastr::success('Registration Successfully', 'Success');
        return to_route('frontend.home');

    }
    public function customerDoLogin(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required|min:6',
        ]);
        if ($validation->fails()) {
            foreach ($validation->messages()->all() as $messages) {
                Toastr::error($messages);
            }
            return redirect()->back();
        }
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
    public function updateProfile(Request $request)
    {
        $fileName = auth()->guard('customers')->user()->image;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = md5(time() . rand()) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/customers/'), $fileName);
        }
        auth()->guard('customers')->user()->update([
            'name' => $request->name,
            'contact' => $request->phone,
            "address" => $request->address,
            'email' => $request->email,
            'image' => $fileName,
        ]);
        return ["status" => "success", "message" => "User Updated Success fully", "data" => auth()->guard('customers')->user()];
    }
}
