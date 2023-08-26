@extends('backend.master')
@section('title', 'Package List')
@section('content')
    <div class="container">
        <h2 class="text-center">Package Lists</h2>
        <hr>
        <a href="{{ route('package.create') }}"><button class="btn btn-outline-primary">Create</button></a>
        <table class="table table-bordered" id="package-table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Room Number</th>
                    <th scope="col">Days</th>
                    <th scope="col">Person</th>
                    <th scope="col">Adults</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
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
            $('#package-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('packages.list') }}",
                columns: [{
                        data: null,
                        name: 'id',
                        data: function(row) {
                            return row.id;
                        }
                    },
                    {
                        data: null,
                        name: 'name',
                        data: function(row) {
                            return row.name;
                        }
                    },
                    {
                        data: null,
                        name: 'room_number',
                        data: function(row) {
                            return row.room.room_number;
                        }
                    },
                    {
                        data: null,
                        name: 'days',
                        data: function(row) {
                            return row.days;
                        }
                    },
                    {
                        data: null,
                        name: 'person',
                        data: function(row) {
                            return row.person;
                        }
                    },
                    {
                        data: null,
                        name: 'adults',
                        data: function(row) {
                            return row.adult;
                        }
                    },
                    {
                        data: null,
                        name: 'price',
                        data: function(row) {
                            return row.price;
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
