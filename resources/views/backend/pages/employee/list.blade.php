@extends('backend.master')
@section('content')

<h2>Empoloyee</h2>
<a class="btn btn primary"href="{{route('employee.create')}}"><button class="btn btn-outline-primary">Create</button></a>
<table class="table table">
<thead>
  <tbody>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Address</th>
      <th>Email</th>
      <th>Age</th>
      <th>Gender</th>
      <th>Description</th>
</tr>
</thead>
<tbody>


@foreach($employees as $key=>$value)
<tr>
  <td>{{++$key}}</td>
  <td>{{$value->name}}</td>
  <td>{{$value->address}}</td>
  <td>{{$value->email}}</td>
  <td>{{$value->age}}</td>
  <td>{{$value->gender}}</td>
  <td>{{$value->description}}</td>
  <td>
      <a class="btn btn-warning" href="">edit</a>
    
      <a class="btn btn-danger" href="">delete</a>
  </td>
</tr>
@endforeach
</tbody>
</table>

</div>

@endsection
