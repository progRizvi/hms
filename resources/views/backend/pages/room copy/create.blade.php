@extends('backend.master')
@section('content')
    <div class="container">

        <h2>Create Package</h2>
        <form action="{{ route('packages.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="">Package Name</label>
                <input type="text" class="form-control" name="name" placeholder="room name">
            </div>
            {{-- room_id --}}
            <div class="mb-3">
                <label for="">Room Type</label>
                <select name="room_id" class="form-control">
                    <option value="">Select A Room Type</option>
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }}">{{ $room->name }}</option>
                    @endforeach
                </select>
            </div>
            {{-- days --}}
            <div class="mb-3">
                <label for="">Days</label>
                <input type="number" class="form-control" name="days" placeholder="days">
            </div>
            {{-- nights --}}
            <div class="mb-3">
                <label for="">Nights</label>
                <input type="number" class="form-control" name="nights" placeholder="nights">
            </div>
            {{-- adults --}}
            <div class="mb-3">
                <label for="">Adults</label>
                <input type="number" class="form-control" name="adults" placeholder="adults">
            </div>
            {{-- childs --}}
            <div class="mb-3">
                <label for="">Childs</label>
                <input type="number" class="form-control" name="childs" placeholder="childs">
            </div>
            {{-- location --}}
            <div class="mb-3">
                <label for="">Location</label>
                <input type="text" class="form-control" name="location" placeholder="location">
            </div>
            {{-- image --}}
            <div class="mb-3">
                <label for="">Image</label>
                <input type="file" class="form-control" name="image" placeholder="image">
            </div>
            {{-- status --}}
            <div class="mb-3">
                <label for="">Status</label>
                <select name="status" class="form-control">
                    <option value="">Select A Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            {{-- price --}}
            <div class="mb-3">
                <label for="">Price</label>
                <input type="number" class="form-control" name="price" placeholder="price">
            </div>
            <div class="mb-3">
                <label for="">Desctiptions</label>
                <textarea name="description" class="form-control" cols="30" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
