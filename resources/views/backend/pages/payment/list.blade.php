@extends('backend.master')
@section('content')
    <h2>Payment List</h2>
    <a href="{{ route('Payment.create') }}"><button class="btn btn-outline-primary">Create</button></a>

    <table class="table table-bordered" id="payment-table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Booking Id</th>
                <th scope="col">Payment Date</th>
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
        $("#payment-table").DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('payment.list') }}",
            buttons: [
                'copy', 'excel', 'pdf', 'print'
            ],
            columns: [{
                    name: 'id',
                    data: null,
                    render: function(row, type, data, meta) {

                        return meta.row + 1;
                    }
                }, {
                    name: "customer_name",
                    data: null,
                    render: function(data) {
                        return data.user.name
                    }
                },
                {
                    name: 'booking_id',
                    data: 'id'
                },
                {
                    name: 'payment_date',
                    data: null,
                    render: function(data) {
                        return moment(data.created_at).format('DD-MM-YYYY');
                    }
                },
                {
                    name: 'amount',
                    data: "advance",
                },
                {
                    name: 'action',
                    data: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });
    </script>
@endpush
