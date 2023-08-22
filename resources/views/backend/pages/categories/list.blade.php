@extends('backend.master')
@section('content')
    <div class="container">
        <h2 class="text-center">Room Type</h2>
        <hr>
        <a href="{{ route('roomtype.create') }}"><button class="btn btn-outline-primary">Create</button></a>

        <table class="table table-bordered" id="categories-table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
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
            $('#categories-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('roomtype.list') }}',
                columns: [{
                        name: 'id',
                        data: function(row) {
                            return row.id;
                        }
                    },
                    {
                        name: 'name',
                        data: function(row) {
                            return row.name;
                        },
                    },
                    {
                        name: 'status',
                        data: function(row) {
                            return row.status;
                        },
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
