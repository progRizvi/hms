@extends('backend.master')
@section('content')
    <div class="container">
        <h2>Create Guest Form</h2>

        <form class="form" action="{{ route('guest.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" placeholder="name" value="{{ $guest->name }}">
            </div>

            <div class="mb-3">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" placeholder="email" value="{{ $guest->email }}">
            </div>

            <div class="mb-3">
                <label for="">Age</label>
                <input type="number" class="form-control" name="age" placeholder="Age" value="{{ $guest->age }}">
            </div>

            <div class="mb-3">
                <label for="">Gender</label><br>
                <input type="radio" name="gender" value="male"
                    @if ($guest->gender == 'male') checked @endif><span>Male</span>
                <input type="radio" name="gender" value="female"
                    @if ($guest->gender == 'female') checked @endif><span>Female</span>
            </div>

            <div class="mb-3">
                <label for="">Addres</label>
                <input type="text" class="form-control" name="address" placeholder="Address"
                    value="{{ $guest->address }}">
            </div>
            <div class="mb-3">
                <label for="">Descriptions</label>
                <textarea name="description" class="form-control" id="" cols="30" rows="10">
value="{{ $guest->description }}"
      </textarea>
            </div>





            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
@endsection
