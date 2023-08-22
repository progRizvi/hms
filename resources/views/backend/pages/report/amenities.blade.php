@extends('backend.master')
@section('content')

    <h2>Amenities Report</h2>

    @if (session()->has('msg'))
        <p class="alert alert-success"> {{ session()->get('msg') }}</p>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>
                <p class="alert-danger"> {{ $error }} </p>
            </div>
        @endforeach
    @endif
    <form action="{{ route('amenities.report.search') }}" method="get">

        <div class="row">
            <div class="col-md-3">
                <label for=""><b>From date:</b></label>
                <input value="{{ request()->from_date }}" name="from_date" type="date" class="form-control">

            </div>
            <div class="col-md-3">
                <label for=""><b>To date:</b></label>
                <input value="{{ request()->to_date }}" name="to_date" type="date" class="form-control">
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>

    </form>
    <div id="amenities_report">

        <h2>Report of - {{ request()->from_date }} to {{ request()->to_date }}</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Single_room</th>
                    <th scope="col">Double_room</th>
                    <th scope="col">King_room</th>
                    <th scope="col">Deluxe_room</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($guest_list))
                    @foreach ($guest_list as $key => $value)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->single_room }}</td>
                            <td>{{ $value->double_room }}</td>
                            <td>{{ $value->king_room }}</td>
                            <td>{{ $value->deluxe_room }}</td>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <button onclick="printDiv('amenities.report')" class="btn btn-danger">Print</button>


    <script>
        function printDiv(divId) {
            var printContents = document.getElementById(divId).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>


@endsection
