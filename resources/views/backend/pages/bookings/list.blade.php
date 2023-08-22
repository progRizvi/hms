@extends('backend.master')
@section('content')
    <div class="container">
        <h2>Booking List</h2>
        {{-- <a class="btn btn primary"href="{{ route('book.create') }}"><button class="btn btn-outline-primary">Create</button></a> --}}
        <table class="table table-bordered" id="booking-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Booking Date</th>
                    <th>Category Name</th>
                    <th>Room Number</th>
                    <th>Descriptions</th>
                    <th>Action</th>
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
            $("#booking-table").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('booking.list') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'booking_date',
                        name: 'booking_date'
                    },
                    {
                        data: 'category_name',
                        name: 'category.name'
                    },
                    {
                        data: 'room_number',
                        name: 'room_number'
                    },
                    {
                        data: 'descriptions',
                        name: 'descriptions'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>
@endpush
