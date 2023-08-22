@extends('backend.master')
@section('content')
    <div class="container">
        <h2 class="text-center">Room Lists</h2>
        <hr>

        <a href="{{ route('room.create') }}"><button class="btn btn-outline-primary">Create</button></a>
        <table class="table table-bordered" id="room-table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Floor Number</th>
                    <th scope="col">Room Number</th>
                    <th scope="col">Room Name</th>
                    <th scope="col">Amenities</th>
                    <th scope="col">Status</th>
                    <th scope="col">Room Type</th>
                    <th scope="col">Beds</th>
                    <th scope="col">Available Beds</th>
                    <th scope="col">Availability</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#room-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('room.list') }}",
                columns: [{
                        data: null,
                        name: 'id',
                        data: function(row) {
                            return row.id;
                        }
                    },
                    {
                        data: null,
                        name: 'floor_number',
                        data: function(row) {
                            return row.floor_number;
                        }
                    },
                    {
                        data: null,
                        name: 'room_number',
                        data: function(row) {
                            return row.room_number;
                        }
                    },
                    {
                        data: null,
                        name: 'room_name',
                        data: function(row) {
                            return row.name;
                        }
                    },
                    {
                        data: null,
                        name: 'amenities',
                        data: function(row) {
                            return row.amenities.map(function(amenity) {
                                return amenity.name;
                            }).join(', ');
                        }
                    },
                    {
                        data: null,
                        name: 'status',
                        data: function(row) {
                            return row.status;
                        }
                    },
                    {
                        data: null,
                        name: 'room_type',
                        data: function(row) {
                            return row.room_type.name;
                        }
                    },
                    {
                        data: null,
                        name: 'beds',
                        data: function(row) {
                            return row.beds;
                        }
                    },
                    {
                        data: null,
                        name: 'available_beds',
                        data: function(row) {
                            return row.available_beds;
                        }
                    },
                    {
                        data: null,
                        name: 'availability',
                        data: function(row) {
                            return row.availability;
                        }
                    },
                    {
                        data: null,
                        name: 'amount',
                        data: function(row) {
                            return row.amount;
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        bDestroy: true,
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        })
    </script>
@endpush
