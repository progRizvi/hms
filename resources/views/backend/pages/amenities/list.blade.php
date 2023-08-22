@extends('backend.master')
@section('content')
    <div class="container">
        <h2>Amenities List</h2>
        <a href="{{ route('amenities.create') }}"><button class="btn btn-outline-primary">Create</button></a>

        <table class="table table-bordered" id="amenities-table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
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
            $("#amenities-table").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('amenities.list') }}",
                columns: [{
                        data: null,
                        name: 'id',
                        data: function(row) {
                            return row.id;
                        }
                    },
                    {
                        name: "name",
                        data: function(row) {
                            return row.name;
                        },
                    },
                    {
                        name: "status",
                        data: function(row) {
                            return row.status;
                        },
                    },
                    {
                        data: 'action',
                        name: 'action',
                        bDestroy: true,
                        orderable: true,
                        searchable: true
                    },
                ]
            });
        });
    </script>
@endpush
