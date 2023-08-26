@extends('backend.master')
@section('title', 'Package Create')
@section('content')
    <div class="container">

        <h2>Create Package</h2>
        <form action="{{ route('packages.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="">Package Name</label>
                <input type="text" class="form-control" name="name" placeholder="Package Name">
            </div>
            {{-- room_id --}}
            <div class="mb-3">
                <label for="">Room No</label>
                <select name="room_id" class="form-control">
                    <option value="">Select A Room</option>
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }}">{{ $room->name }}</option>
                    @endforeach
                </select>
            </div>
            {{-- days --}}
            <div class="mb-3">
                <label for="">Days</label>
                <input type="number" class="form-control" name="days" placeholder="days" min="1">
            </div>
            {{-- nights --}}
            <div class="mb-3">
                <label for="">Nights</label>
                <input type="number" class="form-control" name="nights" placeholder="nights" min="1">
            </div>
            {{-- persion --}}
            <div class="mb-3">
                <label for="">Person</label>
                <input type="number" class="form-control" name="person" placeholder="person" min="1">
            </div>
            {{-- adults --}}
            <div class="mb-3">
                <label for="">Adults</label>
                <input type="number" class="form-control" name="adult" placeholder="adults" min="0">
            </div>
            {{-- childs --}}
            <div class="mb-3">
                <label for="">Childs</label>
                <input type="number" class="form-control" name="child" placeholder="childs" min="0">
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
                <input type="number" class="form-control" name="price" placeholder="price" min="1">
            </div>
            <div class="mb-3">
                <label for="">Desctiptions</label>
                <textarea name="description" class="form-control" cols="30" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
