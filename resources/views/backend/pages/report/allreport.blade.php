@extends('backend.master')

@section('content')
    <div class="container mt-4">
        <div>
            <h1><b>All Reports</b>
                <h1>
        </div>

        <div class="row">
            <div class="col-sm-3">
            </div>

            <div class="d-grid gap-5 col-4 mx-center">

                <!-- Guest report-->
                <a type="button" class="btn btn-success btn-lg" href="{{ route('guest.list.report') }}">Guest List Report</a>

                <!-- Room list report-->
                <a type="button" class="btn btn-success btn-lg" href="{{ route('room.list.report') }}">Room List Report</a>

                <!--Room Category report -->
                <a type="button" class="btn btn-success btn-lg" href="{{ route('roomtype.report') }}">Room Category
                    Report</a>

                <!-- Amenities Reports-->
                <a type="button" class="btn btn-success btn-lg" href="{{ route('amenities.report') }}">Amenities Report</a>

                <!--packages---->

                <a type="button" class="btn btn-success btn-lg" href="{{ route('packages.report') }}">Packages Report</a>

                <!-- booking Reports-->
                <a type="button" class="btn btn-success btn-lg" href="{{ route('booking.report') }}">Booking Report</a>

                <!-- Payment Reports-->
                <a type="button" class="btn btn-success btn-lg" href="{{ route('payment.report') }}">Payment Report</a>

                <!--employee Reports-->
                <a type="button" class="btn btn-success btn-lg" href="{{ route('employee.report') }}">Employee Report</a>
            </div>
        </div>
    @endsection
