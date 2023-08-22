@extends('backend.master')

@section('section')

<h1>Edit Employee Information</h1>

@if(session()->has('msg'))
<p class="alert alert-success"> {{session()->get('msg')}}</p>
@endif

@if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>
               <p class="alert alert-danger"> {{$error}}</p>
            </div>
        @endforeach
    @endif

<div class="container">
    <form action="" method="post" enctype="multipart/form-data">
      @csrf
      @method('put')

  <div class="mb-3">
  <label for="">Enter Employee Name </label>
    <input  type="string" class="form-control" required name="employee_name" placeholder="Enter Employee Name">
  </div>
  <div class="mb-3">
  <label for="">Enter Employee Address </label>
    <input  name="employee_address" type="string" class="form-control" required name="employee_address" placeholder="Enter Room Location">
  </div>

  <div class="mb-3">
  <label for="">Enter Employee Email Address </label>
    <input  name="employee_email_address" type="string" class="form-control" required name="employee_e_mail_address" placeholder="Enter Room Location">
</div>
<div class="mb-3">
  <label for="">Enter Employee Age </label>
    <input  name="employee_age" type="string" class="form-control" required name="employee_age" placeholder="Enter Employee Age">
</div>
<div class="mb-3">
  <label for="">Enter Employee Gender </label>
    <input  name="employee_gender" type="string" class="form-control" required name="employee_gender" placeholder="Enter Employee Gender">
</div>

<div class="mb-3">
    <label for="">Enter Employee Description</label>
    <input  name="employee_description" type="string" class="form-control" required name="employee_description" placeholder="Enter Total Staff">
  </div>
  <div >
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

@endsection
