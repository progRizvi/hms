@extends('backend.master')
@section('content')
    <div class="container">
        <h2>Create Amenity</h2>
        <form action="{{ route('amenities.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="">Name</label>
                <input type="text" class="form-control" required name="name" placeholder="Enter About Amenities">
            </div>
            {{-- price --}}
            <div class="mb-3">
                <label for="">Price</label>
                <input type="number" class="form-control" name="price" placeholder="Enter Price">
            </div>
            {{-- status --}}
            <div class="mb-3">
                <label for="">Status</label>
                <select name="status" class="form-control" id="">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="">Descriptions</label>
                <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit<button>
        </form>
    </div>
@endsection
