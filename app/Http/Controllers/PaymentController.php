<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PaymentController extends Controller
{
    public function list(Request $request) {

        $payments = Booking::with("user")->get();
        if (request()->ajax()) {
            return DataTables::of($payments)
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . route('room.edit', $data->id) . '" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a href="' . route('room.delete', $data->id) . '" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.pages.payment.list', Compact('payments'));

    }

    public function create()
    {
        return view('backend.pages.payment.create');

    }

    public function store(request $request)
    {

        $request->validate([
            'card' => 'required',
            'bkash' => 'required',
            'nagad' => 'required',
            'rocket' => 'required',

        ]);

        Payment::create([
            'card' => $request->card,
            'bkash' => $request->bkash,
            'nagad' => $request->nagad,
            'rocket' => $request->rocket,
            'cash' => $request->cash,
            'others' => $request->others,

        ]);
        return redirect()->route('payment.list');

    }
}
