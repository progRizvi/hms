@extends('frontend.pages.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2>Login Form</h2>
                        <div class="card-body">
                            <form action="{{ route('userCustomer.login') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="">User Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="user email">
                                </div>
                                <div class="mb-3">
                                    <label for="">User Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="password">
                                </div>
                                <button type="submit" class="btn btn-success">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
