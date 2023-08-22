<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class RoomTypeController extends Controller
{
    function list() {

        $categories = RoomType::all();
        if (request()->ajax()) {
            return DataTables::of($categories)
                ->addColumn('action', function ($category) {
                    $button = '<a href="' . route('roomtype.edit', $category->id) . '" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a href="' . route('roomtype.delete', $category->id) . '" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);

        }
        return view('backend.pages.categories.list', compact('categories'));

    }

    public function create()
    {
        return view('backend.pages.categories.create');
    }

    public function store(request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|unique:room_types,name',
        ]);
        if ($validation->fails()) {
            toastr()->error($validation->errors()->first());
            return redirect()->back();
        }
        $input = $request->except("_token");
        $fileName = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/category/', $fileName);
            $input['image'] = $fileName;
        }
        $status = RoomType::create($input);
        if ($status) {
            toastr()->success('Room Type successfully created');
            return redirect()->route('roomtype.list');
        }toastr()->error('Something went wrong');
        return redirect()->back();
    }
    public function edit($id)
    {
        $roomtype = RoomType::find($id);
        return view('backend.pages.categories.edit', compact('roomtype'));
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|unique:categories,name,' . $id,
        ]);
        if ($validation->fails()) {
            toastr()->error($validation->errors()->first());
            return redirect()->back();
        }
        $roomtype = RoomType::find($id);
        $input = $request->except("_token");
        $fileName = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/category/', $fileName);
            $input['image'] = $fileName;
        }
        $status = $roomtype->fill($input)->save();
        if ($status) {
            toastr()->success('Room Type successfully updated');
            return redirect()->route('roomtype.list');
        }toastr()->error('Something went wrong');
        return redirect()->back();
    }

    public function delete($id)
    {

        $roomtype = RoomType::find($id);
        $roomtype->delete();
        toastr()->success('Root Type successfully deleted');
        return redirect()->back();
    }

    public function room_category_report()
    {

        return view('backend.pages.Report.roomtype');

    }

    public function room_category_report_search(Request $request)
    {

        $request->validate([
            'from_date' => 'required|date',
            'to_date' => 'required|date|after:from_date',

        ]);

        $from = $request->from_date;
        $to = $request->to_date;

        $roomtype = RoomType::whereBetween('çreated_at', [$from, $to])->get();
        return view('backend.pages.Report.roomtype', compact('roomtype'));

    }

};
