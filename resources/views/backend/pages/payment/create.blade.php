@extends('backend.master')
@section('content')
<div class="container">
<h2>Create Payment List</h2>

<form class="form" action="{{route('payment.store')}}" method="post">
    @csrf
    <div >
    <label for="">Enter Card Number <span style="color:red">*</span></label>
    <input type="integer" class="form-control" required name="card_number" placeholder="Enter Card Number">
   <div>
   <div class="form-check">
    <label class="">Enter Bkash Number<span style="color:red">*</span> </label>
    <input type="integer" class="form-control" required name="bkash_number" placeholder="Enter Bkash Number">
  </div>
  <div class="form-check">
    <label class="">Enter Nagad Number <span style="color:red">*</span> </label>
    <input type="integer" class="form-control" required name="nagad_number" placeholder="Enter Nagad Number">
  </div>
  <div class="form-check">
    <label for="">Enter Rocket Number <span style="color:red">*</span></label>
    <input type="integer" class="form-control" required name="rocket_number" placeholder="Enter Rocket Number">
  </div>
  <div class="form-check">
    <label class="">Enter Cash Amount <span style="color:red">*</span> </label>
    <input type="integer" class="form-control" required name="cash_amount" placeholder="Enter Cash Amount">
  </div>
  <div class="form-check">
    <label class="">Enter Paying Amount</label>
    <input type="text" class="form-control" required name="paying_amount" placeholder="Enter Amount">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>

</form>

@endsection