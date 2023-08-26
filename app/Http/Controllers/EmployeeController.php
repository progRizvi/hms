<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class EmployeeController extends Controller
{
    function list() {
        $employees = employee::all();
        // dd($employees);
        if (request()->ajax()) {
            return DataTables::of($employees)
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . route('employee.edit', $data->id) . '" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a href="' . route('employee.delete', $data->id) . '" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.pages.employee.list', compact('employees'));
    }
    public function create()
    {
        return view('backend.pages.employee.create');
    }

    public function store(request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'email_address' => 'required',
        ]);
        if ($validation->fails()) {
            foreach ($validation->messages()->all() as $error) {
                toastr()->error($error);
            }
            return redirect()->back();
        }

        Employee::create([
            'employee_name' => $request->name,
            'employee_address' => $request->address,
            'employee_email_address' => $request->email_address,
            'employee_age' => $request->age,
            'employee_gender' => $request->gender,
            'employee_description' => $request->description,
        ]);
        toastr()->success('Employee Added Successfully');
        return redirect()->route('employee.list');

    }

    public function edit($id)
    {
        $employee = employee::find($id);
        return view('backend.pages.employee.edit', compact('employee'));
    }
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'email_address' => 'required',
        ]);

        if ($validation->fails()) {
            foreach ($validation->messages()->all() as $error) {
                toastr()->error($error);
            }
            return redirect()->back();
        }
        $employee = employee::find($id);
        $employee->employee_name = $request->name;
        $employee->employee_address = $request->address;
        $employee->employee_email_address = $request->email_address;
        $employee->employee_age = $request->age;
        $employee->employee_gender = $request->gender;
        $employee->employee_description = $request->description;
        $employee->save();
        toastr()->success('Employee Updated Successfully');
        return redirect()->route('employee.list');
    }
    public function delete($id)
    {
        $employee = employee::find($id);
        $employee->delete();
        toastr()->success('Employee Deleted Successfully');
        return redirect()->back();
    }
}
