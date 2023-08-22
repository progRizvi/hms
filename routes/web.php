<?php

use App\Http\Controllers\AmenitiesController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FrontendHomeController;
use App\Http\Controllers\frontend\CustomerController;
use App\Http\Controllers\frontend\UserPanelController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//frontend template route

// customer user
Route::get('register-create', [CustomerController::class, 'create'])->name('register.create');
Route::post('register-store', [CustomerController::class, 'store'])->name('register.store');

Route::get('user-customer-login', [CustomerController::class, 'customerLogin'])->name('userCustomer.login');
Route::post('user-customer-login', [CustomerController::class, 'customerDoLogin'])->name('userCustomer.login');

Route::get('user-customer-logout', [CustomerController::class, 'customerLogout'])->name('userCustomer.logout');
//user login and register
Route::get('/', [FrontendHomeController::class, 'home'])->name('frontend.home');
Route::get('/user/login', [UserController::class, 'login'])->name('user.login');
Route::post('/user/do-login', [UserController::class, 'dologin'])->name('user.do.login');

//Booking
// Route::get('booking-index', [BookingController::class, 'index'])->name('booking.index');

//package

Route::get('/Package-list', [PackageController::class, 'list'])->name('package.list');
Route::get('/Package-create-from', [PackageController::class, 'create'])->name('package.create');
Route::get('/Package-store', [PackageController::class, 'store'])->name('package.store');

Route::group(['prefix' => 'user', 'middleware' => 'auth:customers'], function () {
    Route::get('/dashboard', [UserPanelController::class, 'index'])->name('user.dashboard');
    Route::get('/logout', [CustomerController::class, 'logout'])->name('user.logout');
    Route::get("/all-booking", [UserPanelController::class, 'allBooking'])->name('user.all.booking');
    Route::get('/profile', [HomeController::class, 'profile'])->name('user.profile');
    Route::get('/profile/edit', [HomeController::class, 'profileEdit'])->name('user.profile.edit');
    Route::post('/profile/update', [HomeController::class, 'profileUpdate'])->name('user.profile.update');
    Route::get('/change-password', [HomeController::class, 'changePassword'])->name('user.change.password');
    Route::post('/change-password', [HomeController::class, 'changePasswordUpdate'])->name('user.change.password.update');

// SSLCOMMERZ Start
    Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
    Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

    Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
    Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

    Route::post('/success', [SslCommerzPaymentController::class, 'success']);
    Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
    Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

    Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
});

// BACKEND START//

Route::get('admin/login', [UserController::class, 'login'])->name('login');
Route::post('/admin/do-login', [UserController::class, 'dologin'])->name('admin.do.login');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:web'], function () {
    Route::get('/', [HomeController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/logout', [UserController::class, 'logout'])->name('admin.logout');

    Route::get('/Room', [RoomController::class, 'Room'])->name('room');
    // room edit
    Route::get('room/edit/{id}', [RoomController::class, 'edit'])->name('room.edit');
    // room delete
    Route::get('room/delete/{id}', [RoomController::class, 'delete'])->name('room.delete');

    Route::get('/Amenities', [AmenitiesController::class, 'Amenities'])->name('amenities');
    Route::get('/Payment', [PaymentController::class, 'Payment'])->name('payment');
    Route::get('/Booking', [BookingController::class, 'Booking'])->name('booking');
    Route::get('/Employee', [EmployeeController::class, 'list'])->name('employee.list');
    Route::get('/Report', [ReportController::class, 'Report'])->name('report');
    Route::get('/Feedback', [FeedbackController::class, 'Feedback'])->name('feedback');

//guest
    Route::get('/guest-list', [GuestController::class, 'list'])->name('guest.list');
    Route::get('guest/edit/{id}', [GuestController::class, 'edit'])->name('guest.edit');
    Route::get('guest/delete/{id}', [GuestController::class, 'delete'])->name('guest.delete');
    Route::get('/guest-create-form', [GuestController::class, 'create'])->name('guest.create');
    Route::post('/guest-store', [GuestController::class, 'store'])->name('guest.store');

    //room type
    Route::group(['prefix' => 'roomtype'], function () {
        Route::get('/list', [RoomTypeController::class, 'list'])->name('roomtype.list');
        Route::get('/create-form', [RoomTypeController::class, 'create'])->name('roomtype.create');
        Route::post('/store', [RoomTypeController::class, 'store'])->name('roomtype.store');
        Route::get('/edit/{id}', [RoomTypeController::class, 'edit'])->name('roomtype.edit');
        Route::post('/update/{id}', [RoomTypeController::class, 'update'])->name('roomtype.update');
        Route::get('/delete/{id}', [RoomTypeController::class, 'delete'])->name('roomtype.delete');
    });

    //room list
    Route::group(['prefix' => 'room'], function () {
        Route::get('/list', [RoomController::class, 'list'])->name('room.list');
        Route::get('/create-form', [RoomController::class, 'create'])->name('room.create');
        Route::post('/store', [RoomController::class, 'store'])->name('room.store');
        Route::get('/edit/{id}', [RoomController::class, 'edit'])->name('room.edit');
        Route::post('/update/{id}', [RoomController::class, 'update'])->name('room.update');
        Route::get('/delete/{id}', [RoomController::class, 'delete'])->name('room.delete');
    });
    // packages
    Route::group(['prefix' => 'packages'], function () {
        Route::get('/list', [PackageController::class, 'list'])->name('packages.list');
        Route::get('/create', [PackageController::class, 'create'])->name('packages.create');
        Route::post('/store', [PackageController::class, 'store'])->name('packages.store');
        Route::get('/edit/{id}', [PackageController::class, 'edit'])->name('packages.edit');
        Route::post('/update/{id}', [PackageController::class, 'update'])->name('packages.update');
        Route::get('/delete/{id}', [PackageController::class, 'delete'])->name('packages.delete');
    });
    //amenities
    Route::group(['prefix' => 'amenities'], function () {
        Route::get('/list', [AmenitiesController::class, 'list'])->name('amenities.list');
        Route::get('/create-form', [AmenitiesController::class, 'create'])->name('amenities.create');
        Route::post('/store', [AmenitiesController::class, 'store'])->name('amenities.store');
        Route::get('/edit/{id}', [AmenitiesController::class, 'edit'])->name('amenities.edit');
        Route::post('/update/{id}', [AmenitiesController::class, 'update'])->name('amenities.update');
        Route::get('/delete/{id}', [AmenitiesController::class, 'delete'])->name('amenities.delete');
    });

    //booking
    Route::group(['prefix' => 'booking'], function () {
        Route::get('/list', [BookingController::class, 'index'])->name('booking.list');
        Route::get('/create-form', [BookingController::class, 'create'])->name('booking.create');
        Route::post('/store', [BookingController::class, 'store'])->name('booking.store');
        Route::get('/edit/{id}', [BookingController::class, 'edit'])->name('booking.edit');
        Route::post('/update/{id}', [BookingController::class, 'update'])->name('booking.update');
        Route::get('/delete/{id}', [BookingController::class, 'delete'])->name('booking.delete');
    });

//payment
    Route::get('/Payment-list', [PaymentController::class, 'list'])->name('payment.list');
    Route::get('/Payment-create-form', [PaymentController::class, 'create'])->name('Payment.create');
    Route::post('/Payment-store', [PaymentController::class, 'store'])->name('payment.store');

//employee
    Route::get('/Employee-list', [EmployeeController::class, 'list'])->name('employee.list');
    Route::get('/Employee-create-form', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('/Employee-store', [EmployeeController::class, 'store'])->name('employee.store');
    Route::get('employee/edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::get('employee/delete/{id}', [EmployeeController::class, 'delete'])->name('employee.delete');
    Route::get('employee/update{id}', [EmployeeController::class, 'update'])->name('employee.update');

//report
    Route::get('/allreport', [ReportController::class, 'all_report'])->name('all.report');

    Route::get('/gueslistreport', [GuestController::class, 'guest_list_report'])->name('guest.list.report');
    Route::get('/gueslistreport/search', [GuestController::class, 'guest_list_report_search'])->name('guest.list.report.search');

    Route::get('/roomlistreport', [RoomController::class, 'room_list_report'])->name('room.list.report');
    Route::get('/roomlistreport/search', [RoomController::class, 'room_list_report_search'])->name('room.list.report.search');

    Route::get('/amenitiesreport', [AmenitiesController::class, 'amenities_report'])->name('amenities.report');
    Route::get('/amenitiesreport/search', [AmenitiesController::class, 'amenities_report_search'])->name('amenities.report.search');

    Route::get('/packagesreport', [PackagesController::class, 'packages_report'])->name('packages.report');
    Route::get('/packagesreport/search', [PackagesController::class, 'packages_report_search'])->name('packages.report.search');

    Route::get('/bookingreport', [BookingController::class, 'booking_report'])->name('booking.report');
    Route::get('/bookingreport/search', [BookingController::class, 'booking_report_search'])->name('booking.report.search');

    Route::get('/paymentreport', [PaymentController::class, 'payment_report'])->name('payment.report');
    Route::get('/paymentreport/search', [PaymentController::class, 'payment_report_search'])->name('payment.report.search');

    Route::get('/employeereport', [EmployeeController::class, 'employee_report'])->name('employee.report');

    Route::get('/roomtypereport', [roomtypeController::class, 'roomtype_report'])->name('roomtype.report');
    Route::get('/roomreport/search', [RoomController::class, 'room_list_report_search'])->name('r.list.report.search');

});
