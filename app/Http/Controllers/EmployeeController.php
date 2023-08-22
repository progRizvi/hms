<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee;
class EmployeeController extends Controller
{
    public function list()
    {
        return view('backend.pages.employee.list');
    }


public function  edit($id){
        
    
    return view('backend.pages.Employee.Edit');
    
}

public function delete($id)
{
  
  $employee=employee::find($id);
  $employee->delete();
  return redirect()->back()->with('msg','Deleted Successfully');
}

public function create()
{
    return view('backend.pages.employee.create');
}


public function store(request $request){

{


    $request->validate([
        'employee_name'=>'required',
        'employee_address'=>'required',
        'employee_email_address'=>'required',

    ]); 

   Employee::create([
   'employee_name'=>$request->employee_name,
   'employee_address'=>$request->employee_address,
   'employee_email_address'=>$request->employee_mail_address,
   'employee_age'=>$request->employee_age,
   'employee_gender' =>$request->employee_gender,
   'employee_description'=>$request->employee_description,


]);
return redirect()->route('employee.list');


}
         }
}