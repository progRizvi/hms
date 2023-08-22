<!DOCTYPE html>
<html lang="en">
@include('frontend.fixed.header')

@yield ('content')


<div class="container-fluid bg-primary py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Welcome to Hotel Management System</h1>
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
            <h1 class="mb-5">Booking Now</h1>
        </div>
        @yield('section')
    </div>
</div>




<!-- Service End -->
<!-- Packages Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s"
            style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
            <h6 class="section-title bg-white text-center text-primary px-3">Packages</h6>
            <h1 class="mb-5">Awesome Packages</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s"
                style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <div class="package-item">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="img/package-1.jpg" alt="">
                    </div>
                    <div class="d-flex border-bottom">
                        <small class="flex-fill text-center border-end py-2"><i
                                class="fa fa-map-marker-alt text-primary me-2"></i>Thailand</small>
                        <small class="flex-fill text-center border-end py-2"><i
                                class="fa fa-calendar-alt text-primary me-2"></i>3 days</small>
                        <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>2
                            Person</small>
                    </div>
                    <div class="text-center p-4">
                        <h3 class="mb-0">$149.00</h3>
                        <div class="mb-3">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                        </div>
                        <p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam eos</p>
                        <div class="d-flex justify-content-center mb-2">
                            <a href="#" class="btn btn-sm btn-primary px-3 border-end"
                                style="border-radius: 30px 0 0 30px;">Read More</a>
                            <a href="#" class="btn btn-sm btn-primary px-3"
                                style="border-radius: 0 30px 30px 0;">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s"
                style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                <div class="package-item">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="img/package-2.jpg" alt="">
                    </div>
                    <div class="d-flex border-bottom">
                        <small class="flex-fill text-center border-end py-2"><i
                                class="fa fa-map-marker-alt text-primary me-2"></i>Indonesia</small>
                        <small class="flex-fill text-center border-end py-2"><i
                                class="fa fa-calendar-alt text-primary me-2"></i>3 days</small>
                        <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>2
                            Person</small>
                    </div>
                    <div class="text-center p-4">
                        <h3 class="mb-0">$139.00</h3>
                        <div class="mb-3">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                        </div>
                        <p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam eos</p>
                        <div class="d-flex justify-content-center mb-2">
                            <a href="#" class="btn btn-sm btn-primary px-3 border-end"
                                style="border-radius: 30px 0 0 30px;">Read More</a>
                            <a href="#" class="btn btn-sm btn-primary px-3"
                                style="border-radius: 0 30px 30px 0;">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s"
                style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                <div class="package-item">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="img/package-3.jpg" alt="">
                    </div>
                    <div class="d-flex border-bottom">
                        <small class="flex-fill text-center border-end py-2"><i
                                class="fa fa-map-marker-alt text-primary me-2"></i>Malaysia</small>
                        <small class="flex-fill text-center border-end py-2"><i
                                class="fa fa-calendar-alt text-primary me-2"></i>3 days</small>
                        <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>2
                            Person</small>
                    </div>
                    <div class="text-center p-4">
                        <h3 class="mb-0">$189.00</h3>
                        <div class="mb-3">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                        </div>
                        <p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam eos</p>
                        <div class="d-flex justify-content-center mb-2">
                            <a href="#" class="btn btn-sm btn-primary px-3 border-end"
                                style="border-radius: 30px 0 0 30px;">Read More</a>
                            <a href="#" class="btn btn-sm btn-primary px-3"
                                style="border-radius: 0 30px 30px 0;">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Packages end -->
<!-- Booking Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s"
    style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
    <div class="container">
        <div class="booking p-5">
            <div class="row g-5 align-items-center">
                <div class="col-md-6 text-white">
                    <h6 class="text-white text-uppercase">Booking</h8>


                </div>
                <div class="col-md-6">
                    <h1 class="text-white mb-4">Book your Reservation</h1>
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
                                    <input type="text" class="form-control bg-transparent datetimepicker-input"
                                        id="date" placeholder="check in date" data-target="#date3"
                                        data-toggle="datetimepicker">
                                    <label for="datetime">Check in Date
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select bg-transparent" id="select1">
                                        <option value="1">Single room</option>
                                        <option value="2">Double room</option>
                                        <option value="3">king room</option>
                                        <option value="3">Adjoining room</option>
                                    </select>
                                    <label for="select1">Packages</label>
                                </div>
                            </div>
                            <div class="col-12">

                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-outline-light w-100 py-3" type="submit">Book Now</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Booking end -->







@include('frontend.fixed.footer')




<!-- Footer End -->


<!-- Back to Top -->

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ url('/frontend/lib/wow/wow.min.js') }}"></script>
<script src="{{ url('/frontend/lib/easing/easing.min.js') }}"></script>
<script src="{{ url('/frontend/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ url('/frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ url('/frontend/lib/tempusdominus/js/moment.min.js') }}"></script>
<script src="{{ url('/frontend/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
<script src="{{ url('/frontend/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ url('/frontend/js/main.js') }}"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
</body>

</html>
