@extends('backend.master')
@section('title', 'Booking List')
@section('content')
    <div class="container">
        <h2>Booking List</h2>
        <table class="table table-bordered" id="booking-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Check In Date</th>
                    <th>Check Out Date</th>
                    <th>Days</th>
                    <th>Paid</th>
                    <th>Due</th>
                    <th>Room Number</th>
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
            const table = $("#booking-table").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('booking.list') }}",
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
                    },
                ],
                columns: [{
                        name: 'id',
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + 1
                        }
                    },
                    {
                        data: null,
                        name: 'name',
                        render: function(data) {
                            return data.user.name;
                        }
                    }, {
                        data: null,
                        name: 'phone_number',
                        render: function(data) {
                            return data.contact;
                        }
                    }, {
                        data: null,
                        name: 'check_in_date',
                        render: function(data) {
                            return data.booking_details[0].check_in_date;
                        }
                    },
                    {
                        data: null,
                        name: 'check_out_date',
                        render: function(data) {
                            return moment(data.booking_details[data.booking_details.length - 1]
                                .check_in_date).format('DD-MM-YYYY');
                        }
                    }, {
                        name: "days",
                        data: null,
                        render: function(data) {
                            return data.booking_details.length;
                        }
                    },
                    {
                        name: 'paid',
                        data: null,
                        render: function(data) {
                            return `BDT ${data.advance}`;
                        }
                    },
                    {
                        name: 'due',
                        data: null,
                        render: function(data) {
                            return `BDT ${data.total_due}`;
                        }
                    },
                    {
                        name: 'room_number',
                        data: null,
                        render: function(data) {
                            return data.room.room_number;
                        }
                    }, {
                        name: 'action',
                        data: null,
                        render: function(data) {
                            if (data.status == "pending") {
                                return `<a href="{{ route('booking.confirm', '') }}/${data.id}" class="btn btn-primary btn-sm">Confirm</a>
                            <a href="{{ route('booking.cancel', '') }}/${data.id}" class="btn btn-danger btn-sm">Cancel</a>`;
                            } else if (data.status == "confirmed") {
                                return `<a href="{{ route('booking.cancel', '') }}/${data.id}" class="btn btn-danger btn-sm">Cancel</a>`;
                            } else {
                                return `<a href="{{ route('booking.confirm', '') }}/${data.id}" class="btn btn-primary btn-sm">Confirm</a>`;
                            }
                        }
                    }
                ],
                colReorder: true,
                dom: 'Bfrtip',
                pageLength: 10,
                bDestroy: true,
                select: true,
                filter: true,
                deferRender: true,
                scrollY: 200,
                scrollCollapse: true,
                scroller: true,
                "searching": true,
                initComplete: function(settings, json) {
                    $('#booking_list th:eq(0)').addClass('no-export');
                }
            });
        });
    </script>
@endpush
