@extends('backend.master')
@section('content')
<div class="container">
<h2>Create Guest Form</h2>

<form class="form" action="{{route('guest.store')}}" method="post">
    @csrf
    
    <div class="mb-3">
      <label for="">Name</label>
      <input type="text" class="form-control" name="name" placeholder="name">
    </div>

    <div class="mb-3">
      <label for="">Email</label>
      <input type="email" class="form-control" name="email" placeholder="email">
    </div>

    <div class="mb-3">
      <label for="">Age</label>
      <input type="number" class="form-control" name="age" placeholder="Age">
    </div>

    <div class="mb-3">
      <label for="">Gender</label><br>
      <input type="radio" name="gender" value="male"><span>Male</span>
      <input type="radio"  name="gender"  value="female"><span>Female</span>
    </div>
    
    <div class="mb-3">
      <label for="">Addres</label>
      <input type="text" class="form-control" name="address" placeholder="Address">
    </div>
    <div class="mb-3">
      <label for="">Descriptions</label>
        <textarea name="textarea" class="form-control" id="" cols="30" rows="10">

      </textarea>
    </div>

    
   
  
  
  <button type="submit" class="btn btn-primary">Submit</button>

</form>
</div>
@endsection