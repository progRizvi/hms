@extends('backend.master')
@section('title', 'Room List')
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
                        render: function(row, type, full, meta) {
                            return meta.row + 1;
                        }
                    },
                    {
                        data: null,
                        name: 'floor_number',
                        render: function(row) {
                            return row.floor_number;
                        }
                    },
                    {
                        data: null,
                        name: 'room_number',
                        render: function(row) {
                            return row.room_number;
                        }
                    },
                    {
                        data: null,
                        name: 'room_name',
                        render: function(row) {
                            return row.name;
                        }
                    },
                    {
                        data: null,
                        name: 'amenities',
                        render: function(row) {
                            return row.amenities.map(function(amenity) {
                                return amenity?.name;
                            }).join(', ');
                        }
                    },
                    {
                        data: null,
                        name: 'status',
                        render: function(row) {
                            return row.status;
                        }
                    },
                    {
                        data: null,
                        name: 'room_type',
                        render: function(row) {
                            return row.room_type?.name;
                        }
                    },
                    {
                        data: null,
                        name: 'beds',
                        render: function(row) {
                            return row.beds;
                        }
                    },
                    {
                        data: null,
                        name: 'available_beds',
                        render: function(row) {
                            return row.available_beds;
                        }
                    },
                    {
                        data: null,
                        name: 'availability',
                        render: function(row) {
                            return row.availability;
                        }
                    },
                    {
                        data: null,
                        name: 'amount',
                        render: function(row) {
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
