@extends('backend.master')
@section('content')
    <div class="container">
        <h2 class="text-center">Edit Room Type</h2>
        <hr>
        <form action="{{ route('room.update', $room->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- floor number --}}
            <div class="mb-3">
                <label for="">Floor Number</label>
                <input type="number" class="form-control" name="floor_number" value="{{ $room->floor_number }}">
            </div>
            {{-- room number --}}
            <div class="mb-3">
                <label for="">Room Number</label>
                <input type="number" class="form-control" name="room_number" value="{{ $room->room_number }}">
            </div>
            {{-- room name --}}
            <div class="mb-3">
                <label for="">Room Name</label>
                <input type="text" class="form-control" name="name" value="{{ $room->name }}">
            </div>
            {{-- status --}}
            <div class="mb-3">
                <label for="">Status</label>
                <select name="status" class="form-control">
                    <option value="">Select A Status</option>
                    <option value="active" {{ $room->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $room->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            {{-- room type --}}
            <div class="mb-3">
                <label for="">Room Type</label>
                <select name="room_type_id" class="form-control">
                    @foreach ($room_types as $room_type)
                        <option value="{{ $room->id }}" {{ $room_type->id == $room->room_id ? 'selected' : '' }}>
                            {{ $room_type->name }}</option>
                    @endforeach
                </select>
            </div>
            {{-- beds --}}
            <div class="mb-3">

                <label for="">Beds</label>
                <select name="beds[]" class="form-control select2" multiple>
                    <option value="">Select A Bed</option>
                    <option value="single"
                        {{ $room->beds[0] == 'single' || isset($room->beds[1]) == 'single' ? 'selected' : '' }}>
                        Single</option>
                    <option value="double"
                        {{ $room->beds[0] == 'double' || isset($room->beds[1]) == 'double' ? 'selected' : '' }}>Double
                    </option>
                </select>
            </div>
            {{-- single bed --}}
            <div class="mb-3">
                <label for="">Single Bed</label>
                <input type="number" class="form-control" name="single_bed" value="{{ $room->single_bed }}">
            </div>
            {{-- double bed --}}
            <div class="mb-3">
                <label for="">Double Bed</label>
                <input type="number" class="form-control" name="double_bed" value="{{ $room->double_bed }}">
            </div>
            {{-- available beds --}}
            <div class="mb-3">
                <label for="">Available Beds</label>
                <input type="number" class="form-control" name="available_beds" value="{{ $room->available_beds }}">
            </div>
            {{-- availability --}}
            <div class="mb-3">
                <label for="">Availability</label>
                <select name="availability" class="form-control">
                    <option value="">Select A Availability</option>
                    <option value="available" {{ $room->availability == 'available' ? 'selected' : '' }}>Available
                    </option>
                    <option value="unavailable" {{ $room->availability == 'booked' ? 'selected' : '' }}>
                        Booked</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="">Amount</label>
                <input type="number" class="form-control" name="amount" value="{{ $room->amount }}">
            </div>
            <div class="mb-3">
                <label for="">Amenites</label>
                <select name="amenity_id[]" class="form-control select2" multiple>
                    @foreach ($amenites as $amenite)
                        <option value="{{ $amenite->id }}"
                            {{ in_array($amenite->id, $room->amenities->pluck('id')->toArray()) ? 'selected' : '' }}>
                            {{ $amenite->name }}</option>
                    @endforeach
                </select>
            </div>
            {{-- description --}}
            <div class="mb-3">
                <label for="">Description</label>
                <textarea name="description" class="form-control" id="" cols="30" rows="10">{{ $room->description }}</textarea>
            </div>
            {{-- images --}}
            <div class="mb-3">
                <label for="">Images</label>
                <input type="file" class="form-control" name="images[]" multiple>
            </div>
            {{-- amount --}}


            <div class="mb-3">
                <button type="submit" class="btn btn-outline-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        })
    </script>
@endpush
