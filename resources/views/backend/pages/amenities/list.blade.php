@extends('backend.master')
@section('title', 'Amenities List')
@section('content')
    <div class="container">
        <h2>Amenities List</h2>
        <a href="{{ route('amenities.create') }}"><button class="btn btn-outline-primary">Create</button></a>

        <table class="table table-bordered" id="amenities-table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
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
            $("#amenities-table").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('amenities.list') }}",
                columns: [{
                        data: null,
                        name: 'id',
                        data: function(row, type, full, meta) {
                            return meta.row + 1;
                        }
                    },
                    {
                        name: "name",
                        data: function(row) {
                            return row.name;
                        },
                    },
                    {
                        name: "price",
                        data: function(row) {
                            return row.price ? `BDT ${row.price}` : 'N/A';
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
