@extends('frontend.master')

@section('content')
    {{-- @dd($room) --}}
    <div class="row g-4" style="padding-top:130px">
        <div id="booking" class="section">
            <div class="section-center">
                <div class="container">
                    <div class="row">
                        <div class="booking-form">
                            <div class="booking-bg"></div>
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                            <form method='post' action="{{ route('pay.now', $room->id) }}">
                                @csrf
                                <div class="form-header">
                                    <h2>Reserve your room</h2>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="form-label">Check In</span>
                                            <input class="form-control" type="date" name="check_in" required
                                                id="checkin">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="form-label">Check Out</span>
                                            <input class="form-control" type="date" name="check_out" required
                                                id="checkout">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <span class="form-label">Name</span>
                                    <input class="form-control" type="text" name="name" required
                                        placeholder="Enter your name">
                                </div>

                                <div class="form-group">
                                    <span class="form-label">Email</span>
                                    <input class="form-control" type="email" required name="email"
                                        placeholder="Enter your email">
                                </div>
                                <div class="form-group">
                                    <span class="form-label">Address</span>
                                    <input class="form-control" type="text" name="address" required
                                        placeholder="Enter your Address">
                                </div>
                                <div class="form-group">
                                    <span class="form-label">Phone</span>
                                    <input class="form-control" type="tel" name="contact" required
                                        placeholder="Enter your phone number">
                                </div>
                                <input type="hidden" name="amount" value={{ $room->amount }}>
                                <p class="mt-3">Payment: BDT <span id="total">{{ $room->amount }}</span></p>
                                <div class="form-group">
                                    <span class="form-label">Advance</span>
                                    <input class="form-control" type="number" name="advance" required
                                        placeholder="Enter an amount">
                                </div>
                                <div class="form-btn">
                                    <button type="submit" class="btn btn-primary">Book Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $("#checkin, #checkout").change(function() {
                var checkin = $("#checkin").val();
                var checkout = $("#checkout").val();
                var date1 = new Date(checkin);
                var date2 = new Date(checkout);
                var Difference_In_Time = date2.getTime() - date1.getTime();
                var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
                var amount = {{ $room->amount }};
                var total = amount * Difference_In_Days;
                $('[name="amount"]').val(total ? total > 0 && total : "{{ $room->amount }}");
                $("#total").text(total ? total > 0 && total : "{{ $room->amount }}");
            });
        });
    </script>
@endpush
