<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        $books = Booking::all();
        return view('frontend.pages.books.booking', compact('books'));
    }
}
