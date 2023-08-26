<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\CustomerUser;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function dashboard()
    {
        $todayBookings = Booking::whereDate('created_at', Carbon::today())->count();
        $todayTotalBookings = Booking::whereDate('created_at', Carbon::today())->sum('total_amount');
        $lastMonthBooking = Booking::whereMonth('created_at', Carbon::now()->subMonth())->count();
        $customers = CustomerUser::count();
        // dd($todayBookings, $todayTotalBookings, $lastMonthBooking);
        return view('backend.pages.dashboard', compact('todayBookings', 'todayTotalBookings', 'lastMonthBooking', "customers"));
    }

}
