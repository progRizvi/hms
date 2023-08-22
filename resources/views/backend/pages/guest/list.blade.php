@extends('backend.master')
@section('content')
    <div class="container">
        <h2 class="text-center">Guest List</h2>
        <hr>
        <a class="btn  btn-sm btn primary"href="{{ route('guest.create') }}"><button class="btn btn-outline-primary">Create
            </button></a>
        <table id="guests-table" class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>

    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            var table = $('#guests-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('guest.list') }}",
                buttons: [{
                        text: `<div class='d-flex justify-content-center align-items-center'>
                                   <i class="pl-2 fa fa-copy"></i>
                                    </div>`,
                        extend: 'copy',
                        exportOptions: {
                            columns: ':visible:not(.no-export)'
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible:not(.no-export)'
                        }
                    }, {
                        extend: 'csv',
                        exportOptions: {
                            columns: ':visible:not(.no-export)'
                        }
                    }, {
                        text: '<i class="fa fa-file"></i>',
                        extend: 'pdf',
                        exportOptions: {
                            columns: ':visible:not(.no-export)'
                        }
                    }, {
                        text: '<i class="fa fa-print"></i>',
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible:not(.no-export)'
                        }
                    }
                ],
                columns: [{
                        name: 'id',
                        data: null,
                        data: function(row) {
                            return row.id;
                        }
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'age',
                        name: 'age'
                    },
                    {
                        data: 'gender',
                        name: 'gender'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'action',
                        dom: 'Bfrtip',
                        name: 'action',
                        colReorder: true,
                        bDestroy: true,
                        initComplete: function(settings, json) {
                            $('#booking_list th:eq(0)').addClass('no-export');
                        }
                    },
                ],
            });
            table.buttons().container()
                .appendTo($('.col-sm-6:eq(0)', table.table().container()));
        });
    </script>
@endpush
