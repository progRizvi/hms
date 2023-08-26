@extends('frontend.master')

@section('content')
    <div class="container-fluid bg-primary py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row justify-content-center py-5">
                <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Enjoy A Luxury Experience</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s"
                style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <h6 class="section-title bg-white text-center text-primary px-3">Booking</h6>
                <h1 class="mb-5">Our Rooms</h1>
                <div class="row g-4 justify-content-center">
                    @foreach ($rooms as $key => $room)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.{{ $key * 2 }}s"
                            style="visibility: visible; animation-delay: 0.{{ $key * 2 }}s; animation-name: fadeInUp;">
                            <div class="package-item">
                                <div class="overflow-hidden">
                                    <img class="img-fluid" src="{{ url('rooms/images/', $room->images[0]) }}"
                                        alt="">
                                </div>
                                <div class="d-flex border-bottom">
                                    <small class="flex-fill text-center py-2"><i
                                            class="fa fa-user text-primary me-2"></i>{{ $room->person }}
                                        Person</small>
                                </div>
                                <div class="text-center p-4">
                                    <h3 class="mb-0">BDT {{ $room->amount }}</h3>
                                    <p>
                                        {{ $room->description }}
                                    </p>
                                    <div class="d-flex justify-content-center mb-2">
                                        <a href="{{ route('room.details', $room->id) }}"
                                            class="btn btn-sm btn-primary px-3 border-end"
                                            style="border-radius: 30px 0 0 30px;">Read More</a>
                                        <a @auth('customers')
                                            href="{{ route('user.booking', $room->id) }}"
                                            @else
                                            href="javascript:void(0)"
                                            data-bs-toggle="modal" data-bs-target="#modalLoginForm"
                                        @endauth
                                            class="booking_modal btn btn-sm btn-primary px-3"
                                            style="border-radius: 0 30px 30px 0;">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @yield('section')
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Book Your Room</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-transparent" id="name"
                                        placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control bg-transparent" id="email"
                                        placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating date" id="date3" data-target-input="nearest">
                                    <input type="date" class="form-control bg-transparent datetimepicker-input"
                                        id="date" placeholder="check in date" data-target="#date3"
                                        data-toggle="datetimepicker">
                                    <label for="datetime">Check in Date
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating booking_packages">
                                    <select class="form-select bg-transparent" id="select1">
                                        <option value="1">Single room</option>
                                        <option value="2">Double room</option>
                                        <option value="3">king room</option>
                                        <option value="3">Adjoining room</option>
                                    </select>
                                    <label for="select1">Packages</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Book Now</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('.booking_modal').click(function() {
                var id = $(this).data('id');
                var type = $(this).data('type');
                var url = `{{ route('user.booking', '') }}/${id}`;
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        id: id,
                        type: type
                    },
                    success: function(response) {
                        $('.modal-body').html(response);
                    }
                });
            });
        });
    </script>
@endpush
