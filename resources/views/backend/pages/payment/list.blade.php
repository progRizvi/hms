@extends('backend.master')
@section('content')
    <h2>Payment List</h2>
    <a href="{{ route('Payment.create') }}"><button class="btn btn-outline-primary">Create</button></a>

    <table class="table table-bordered" id="payment-table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Card</th>
                <th scope="col">Bkash</th>
                <th scope="col">Nagad</th>
                <th scope="col">Rocket</th>
                <th scope="col">Cash</th>
                <th scope="col">Paying Amount</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    </div>
@endsection
