@extends('backend.master')
@section('content')
<div class="container">
<h2>Create Employee List</h2>

<form class="form" action="{{route('employee.store')}}" method="post">
    @csrf
    <div >
    <label for="">Enter Employee Name <span style="color:red">*</span></label>
    <input type="text" class="form-control" required name="employee_name" placeholder="Enter Employee Name">
   <div>
   <div class="form-check">
    <label class="">Enter Employee Address <span style="color:red">*</span> </label>
    <input type="text" class="form-control" required name="employee_address" placeholder="Enter Employee Address">
  </div>
  <div class="form-check">
    <label class="">Enter Employee E-Mail Address <span style="color:red">*</span> </label>
    <input type="email" class="form-control" required name="email" placeholder="Enter Employee E-mail Address">
  </div>
  <div class="form-check">
    <label for="">Enter Employee Age <span style="color:red">*</span></label>
    <input type="integer" class="form-control" required name="age" placeholder="Enter Employee Age">
  </div>
  <div class="form-check">
    <label class="">Enter Employee Gender <span style="color:red">*</span> </label>
    <input type="text" class="form-control" required name="gender" placeholder="Enter Employee Gender">
  </div>
  <div class="form-check">
    <label class="">Enter Employee description</label>
    <input type="employee_description" class="form-control" required name="description" placeholder="Enter Guest Description">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>

</form>

@endsection