<!DOCTYPE html>
<html lang="en">
@include('frontend.fixed.header')

@yield ('content')



<!-- Footer Start -->
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
@stack('js')
</body>

</html>
