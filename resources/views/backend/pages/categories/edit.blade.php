@extends('backend.master')
@section('content')
    <div class="container">

        <h2>Create Room Type </h2>
        <form action="{{ route('roomtype.update', $roomtype->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- name --}}
            <div class="mb-3">
                <label for="">Name</label>
                <input type="text" name="name" value="{{ $roomtype->name }}" class="form-control" placeholder="name">
            </div>
            {{-- status --}}
            <div class="mb-3">
                <label for="">Status</label>
                <select name="status" class="form-control">
                    <option value="active" {{ $roomtype->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $roomtype->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            {{-- image --}}
            <div class="mb-3">
                <label for="">Image</label>
                <input type="file" name="image" class="form-control">
                <img src="{{ asset('uploads/roomtype/' . $roomtype->image) }}" alt="" width="100">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
