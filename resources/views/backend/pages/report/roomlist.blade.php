@extends('backend.master')
@section('content')

<h2>Room list Report</h2>

@if(session()->has('msg'))
<p class="alert alert-success"> {{session()->get('msg')}}</p>
@endif

@if ($errors->any())
  @foreach($errors->all() as $error)
    <div>
      <p class="alert-danger"> {{$error}} </p>
  </div>
  @endforeach
  @endif
<form action="{{route('room.list.report.search')}}" method="get">

<div class="row">
    <div class="col-md-3">
        <label for=""><b>From date:</b></label>
        <input value="{{request()->from_date}}" name="from_date" type="date" class="form-control">

    </div>
    <div class="col-md-3">
        <label for=""><b>To date:</b></label>
        <input value="{{request()->to_date}}" name="to_date" type="date" class="form-control">
    </div>
    <div class="col-md-3">
        <button type="submit" class="btn btn-primary">Search</button>
    </div>
</div>

</form>
<div id="guest_list_report">

<h2>Report of - {{request()->from_date}} to  {{request()->to_date}}</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Room_number</th>
            <th scope="col">Room_location</th>
            <th scope="col">Room_description</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($guest_list))
        @foreach($guest_list as $key=>$value)
        <tr>
        <td>{{++$key}}</td>
      <td>{{$value->id}}</td>
      <td>{{$value->room_number}}</td>
      <td>{{$value->room_location}}</td>
      <td>{{$value->room_description}}</td>
      
        @endforeach
        @endif
        </tbody>
    </table>
</div>
<button onclick="printDiv('room.list.report')" class="btn btn-danger">Print</button>


<script>
    function printDiv(divId){
        var printContents = document.getElementById(divId).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>


@endsection
