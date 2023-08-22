@extends('backend.master')
@section('content')
<div class="container">
<h2>Create Booking</h2>

<form action="{{route('book.store')}}" method="post">
    @csrf
    
   <div class="mb-3">
    <label class="">Date</label>
    <input type="date" name="date" class="form-control" required >
  </div>

  <div class="mb-3">
    <label for="">Category Name</label>
    <select name="category_id" class="form-control" >
      @foreach ($categories as $value )
      <option value="{{$value->id}}">{{$value->name}}</option>
      @endforeach
    </select>
  </div>

  <div class="mb-3">
    <label for="">Room Number</label>
    <select name="room_id" class="form-control" >
      @foreach ($rooms as $value )
      <option value="{{$value->id}}">{{$value->room_number}}</option>
      @endforeach
    </select>
  </div>

  <div class="mb-3">
    <label for="">Amenities</label>
    <select name="amenitie_id" class="form-control" >
      @foreach ($amenities as $value )
      <option value="{{$value->id}}">{{$value->description}}</option>
      @endforeach
    </select>
  </div>
  
  
  <button type="submit" class="btn btn-primary">Submit</button>

</form>

@endsection