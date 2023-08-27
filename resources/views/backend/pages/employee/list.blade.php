@extends('backend.master')
@section('title', 'Employee List')
@section('content')
    <h2>Empoloyee</h2>
    <div class="container">
        <a class="btn btn-primary"href="{{ route('employee.create') }}">Create</a>
        <table class="table table-bordered" id="employee_table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Email</th>
                    <th scope="col">Age</th>
                    <th scope="col">Gender</th>
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
            $("#employee_table").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('employee.list') }}",
                columns: [{
                        name: 'id',
                        data: null,
                        render: function(row, type, full, meta) {
                            return meta.row + 1;
                        }
                    }, {
                        name: 'name',
                        data: 'employee_name',
                    }, {
                        name: 'address',
                        data: 'employee_address',
                    }, {
                        name: 'email_address',
                        data: 'employee_email_address',
                    },
                    {
                        name: 'age',
                        data: 'employee_age',
                    },
                    {
                        name: "gender",
                        data: "employee_gender",
                    },
                    {
                        name: "action",
                        data: "action",
                        bDestroy: true,
                        orderable: false,
                        searchable: false
                    }
                ]
            })
        })
    </script>
@endpush
