@extends('backend.master')
@section('title', 'Edit Employee')
@section('content')
    <div class="container">
        <form action="{{ route('employee.update', $employee->id) }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="">Employee Name</label>
                <input type="text" name="name" class="form-control" id="" value="{{ $employee->employee_name }}">
            </div>
            <div class="mb-3">
                <label for="">Employee Address</label>
                <input type="text" name="address" class="form-control" value="{{ $employee->employee_address }}">
            </div>
            <div class="mb-3">
                <label for="">Employee Email Address</label>
                <input type="email" name="email_address" class="form-control"
                    value="{{ $employee->employee_email_address }}">
            </div>
            <div class="mb-3">
                <label for="">Employee Age</label>
                <input type="text" name="age" class="form-control" value="{{ $employee->employee_age }}">
            </div>
            <div class="mb-3">
                <div>
                    <label for="">Female</label>
                    <input type="radio" name="gender" value="female" @if ($employee->employee_gender == 'female') checked @endif>
                    <label for="">Male</label>
                    <input type="radio" name="gender" value="male" @if ($employee->employee_gender == 'male') checked @endif>
                </div>
            </div>
            <div class="mb-3">
                <label for="">Employee Description</label>
                <textarea name="description" class="form-control">{{ $employee->employee_description }}</textarea>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
