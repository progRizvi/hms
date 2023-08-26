@extends('backend.master')
@section('title', 'Reports')
@section('content')

    <div class="container">
        <h1>Reports- {{ date('d-m-Y') }}</h1>

        <form action="{{ route('booking.report.search') }}" method="get">
            <div class="row">
                <div class="col-md-4">
                    <label for="">From date:</label>
                    <input name="from_date" type="date" class="form-control">

                </div>
                <div class="col-md-4">
                    <label for="">To date:</label>
                    <input name="to_date" type="date" class="form-control">
                </div>
                <div class="col-md-4"> <br>
                    <button type="submit" class="btn btn-success">Search</button>
                </div>
            </div>
        </form><br>

        <div id="bookingReport">

            <!-- <h1>Reports- {{ date('d-m-Y') }}</h1> -->

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Room Number</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Paid Amount</th>
                        <th scope="col">Booking Date</th>

                    </tr>
                </thead>

                <tbody>
                    @if (isset($rooms))
                        @foreach ($rooms as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->user->name }}</td>
                                <td>{{ $data->room->room_number }}</td>
                                <td>{{ $data->total_amount }}</td>
                                <td>{{ $data->advance }}</td>
                                <td>{{ $data->created_at->format('d-m-Y') }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <button onclick="printDiv('bookingReport')" class="btn btn-success">Print</button>
    </div>
@endsection

@push('js')
    <script>
        function printDiv(divId) {
            var printContents = document.getElementById(divId).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
@endpush
