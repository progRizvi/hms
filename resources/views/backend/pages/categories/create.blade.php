@extends('backend.master')
@section('content')
    <div class="container">

        <h2>Create Room Type </h2>
        <form action="{{ route('roomtype.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" placeholder="name">
            </div>
            {{-- status --}}
            <div class="mb-3">
                <label for="">Status</label>
                <select name="status" class="form-control">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
