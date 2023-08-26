@extends('backend.master')
@section('title', 'Create Room')
@section('content')
    <div class="container">

        <h2>Create Room List</h2>
        <form action="{{ route('room.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="">Floor Number</label>
                <input type="number" class="form-control" name="floor_number" placeholder="floor number">
            </div>

            <div class="mb-3">
                <label for="">Room Number</label>
                <input type="number" class="form-control" name="room_number" placeholder="room number">
            </div>
            {{-- room name --}}
            <div class="mb-3">
                <label for="">Room Name</label>
                <input type="text" class="form-control" name="name" placeholder="room name">
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

            {{-- room type --}}
            <div class="mb-3">
                <label for="">Room Type</label>
                <select name="room_type_id" class="form-control">
                    @foreach ($room_types as $room_type)
                        <option value="{{ $room_type->id }}">{{ $room_type->name }}</option>
                    @endforeach
                </select>
            </div>
            {{-- beds --}}
            <div class="mb-3">
                <label for="">Beds</label>
                <select name="beds[]" class="form-control select2" multiple>
                    <option value="">Select A Bed</option>
                    <option value="single">Single</option>
                    <option value="double">Double</option>
                </select>
            </div>
            {{-- available beds --}}
            <div class="mb-3">
                <label for="">Available Beds</label>
                <input type="number" class="form-control" name="available_beds" placeholder="available beds">
            </div>
            {{-- single_bed --}}
            <div class="mb-3">
                <label for="">Single Bed</label>
                <input type="number" class="form-control" name="single_bed" placeholder="single bed">
            </div>
            {{-- double_bed --}}
            <div class="mb-3">
                <label for="">Double Bed</label>
                <input type="number" class="form-control" name="double_bed" placeholder="double bed">
            </div>
            {{-- availability --}}
            <div class="mb-3">
                <label for="">Availability</label>
                <select name="availability" class="form-control">
                    <option value="">Select A Availability</option>
                    <option value="available">Available</option>
                    <option value="booked">Booked</option>
                </select>
            </div>
            {{-- person --}}
            <div class="mb-3">
                <label for="">Person</label>
                <input type="number" class="form-control" name="person" placeholder="person">
            </div>


            {{-- amount --}}
            <div class="mb-3">
                <label for="">Amount</label>
                <input type="number" class="form-control" name="amount" placeholder="amount">
            </div>
            <div class="mb-3">
                <label for="">Amenites</label>
                <select name="amenity_id[]" class="form-control select2" multiple>
                    @foreach ($amenites as $amenite)
                        <option value="{{ $amenite->id }}">{{ $amenite->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- images --}}
            <div class="mb-3">
                <label for="">Images</label>
                <input type="file" class="form-control" name="images[]" multiple>
            </div>
            <div class="mb-3">
                <label for="">Desctiptions</label>
                <textarea name="description" class="form-control" cols="30" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush
