<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    public function report()
    {

        return view('backend.pages.report.report');

    }
    public function reportSearch(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
        ]);

        if ($validator->fails()) {

            Toastr::warning('Opps !!', 'From_date should greater than To_date.');
            return redirect()->back();
        }

        $from = $request->from_date;
        $to = $request->to_date;

        $rooms = Booking::whereBetween('created_at', [$from, $to])->get();

        return view('backend.pages.report.report', compact('rooms'));

    }
}
