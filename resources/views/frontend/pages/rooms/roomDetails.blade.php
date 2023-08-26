@extends('frontend.master')
@section('title', 'Room Details')
@section('content')
    <style>
        .navbar-light .navbar-nav .nav-link,
        .navbar-light .navbar-nav .nav-link.active {
            color: rgba(0, 0, 0, .9) !important;
        }
    </style>

    <div class="container" style="padding-top:150px ">
        <div class="row row-cols-1 row-cols-md-2">
            <div class="col mb-4">
                <!-- Card -->
                <div class="card">

                    <!--Card image-->
                    <div class="view overlay">
                        <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/16.webp"
                            alt="Card image cap">
                        <a href="#!">
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>

                    <!--Card content-->
                    <div class="card-body">

                        <!--Title-->
                        <h4 class="card-title">Card title</h4>
                        <!--Text-->
                        <p class="card-text">
                            <strong>Floor Number:</strong> {{ $room->floor_number }}<br>
                            <strong>Room Number:</strong> {{ $room->room_number }}<br>
                            <strong>Name:</strong> {{ $room->name }}<br>
                            <strong>Status:</strong> {{ $room->status }}<br>
                            <strong>Room Type:</strong> {{ $room->room_type_id }}<br>
                            <strong>Beds:</strong>
                            @foreach ($room->beds as $bed)
                                {{ $bed }}
                            @endforeach
                            <br>
                            <strong>Available Beds:</strong> {{ $room->available_beds }}<br>
                            <strong>Single Beds:</strong> {{ $room->single_bed }}<br>
                            <strong>Double Beds:</strong> {{ $room->double_bed }}<br>
                            <strong>Availability:</strong> {{ $room->availability }}<br>
                            <strong>Person:</strong> {{ $room->person }}<br>
                            <strong>Amount:</strong> ${{ $room->amount }}<br>
                            <strong>Description:</strong> {{ $room->description }}<br>
                        </p>
                        <a href="{{ route('user.booking', $room->id) }}" class="btn btn-info btn-md">Book Now</a>

                    </div>

                </div>
                <!-- Card -->
            </div>
        </div>
    </div>
@endsection
