@extends('backend.master')
@section('title', 'Create Employee')

@section('content')
    <div class="container">
        <h2>Create Employee List</h2>

        <form class="form" action="{{ route('employee.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="">Employee Name</label>
                <input type="text" name="name" class="form-control" id="">
            </div>
            <div class="mb-3">
                <label for="">Employee Address</label>
                <input type="text" name="address" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Employee Email Address</label>
                <input type="email" name="email_address" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Employee Age</label>
                <input type="text" name="age" class="form-control">
            </div>
            <div class="mb-3">
                <div>
                    <label for="">Female</label>
                    <input type="radio" name="gender" value="female">
                    <label for="">Male</label>
                    <input type="radio" name="gender" value="male">
                </div>
            </div>
            <div class="mb-3">
                <label for="">Employee Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

        </form>
    @endsection
