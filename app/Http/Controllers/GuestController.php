<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GuestController extends Controller
{
    public function list() {
        $guest = Guest::all();
        if (request()->ajax()) {
            return DataTables::of($guest)
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . route('guest.edit', $data->id) . '" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a href="' . route('guest.delete', $data->id) . '" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.pages.guest.list', Compact('guest'));
    }

    public function create()
    {
        return view('backend.pages.guest.create');
    }
    public function store(Request $request)
    {
        Guest::create([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'gender' => $request->gender,
            'address' => $request->address,
            'description' => $request->textarea,
        ]);
        return to_route('guest.list');

    }

    public function guest_list_report()
    {

        return view('backend.pages.Report.guestlist');

    }

    public function guest_list_report_search()
    {

        $request->validate([
            'from_date' => 'required|date',
            'to_date' => 'required|date|after:from_date',

        ]);

        $from = $request->from_date;
        $to = $request->to_date;

        $guest = Guest::whereBetween('çreated_at', [$from, $to])->get();
        return view('backend.pages.Report.guestlist', compact('guest_list'));

    }

}
