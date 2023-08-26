@extends('frontend.master')
@section('title', 'All Rooms')
@section('content')
    <style>
        .navbar-light .navbar-nav .nav-link,
        .navbar-light .navbar-nav .nav-link.active {
            color: rgba(0, 0, 0, .9) !important;
        }
    </style>
    <div class="container" style="padding-top:150px ">
        @foreach ($rooms as $key => $room)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.{{ $key * 2 }}s"
                style="visibility: visible; animation-delay: 0.{{ $key * 2 }}s; animation-name: fadeInUp;">
                <div class="package-item">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="{{ url('rooms/images/', $room->images[0]) }}" alt="">
                    </div>
                    <div class="d-flex border-bottom">
                        <small class="flex-fill text-center py-2"><i
                                class="fa fa-user text-primary me-2"></i>{{ $room->person }}
                            Person</small>
                    </div>
                    <div class="text-center p-4">
                        <h3 class="mb-0">BDT{{ $room->amount }} Per Day-Night</h3>
                        <p>
                            {{ $room->description }}
                        </p>
                        <div class="d-flex justify-content-center mb-2">
                            <a href="{{ route('room.details', $room->id) }}" class="btn btn-sm btn-primary px-3 border-end"
                                style="border-radius: 30px 0 0 30px;">Read More</a>
                            <a @auth('customers')
                                            href="{{ route('user.booking', $room->id) }}"
                                            @else
                                            href="javascript:void(0)"
                                            data-bs-toggle="modal" data-bs-target="#modalLoginForm"
                                        @endauth
                                class="booking_modal btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Book
                                Now</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
