@extends('layouts.master')
@section('content')
<form action="{{route('students.update',$student)}}" method="POST" class="row g-2">
  @csrf
  @method("PUT")
  <div class="mb-3 col-12">
      <label for="exampleFormControlInput1" class="form-label">student Name</label>
      <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="student Name" value="{{$student->name}}">
  </div>
  <div class="mb-3 col-6">
      <label for="exampleFormControlInput1" class="form-label">University ID</label>
      <input type="number" class="form-control" name="uni_id" id="exampleFormControlInput1" placeholder="University ID" value="{{$student->uni_id}}">
  </div>
  <div class="mb-3 col-6">
      <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
      <input type="text" class="form-control" name="phone" id="exampleFormControlInput1" placeholder="Phone Number" value="{{$student->phone}}">
  </div>

  <div class="mb-3 col-12">
      <button type="submit" class="btn btn-primary d-block">Add</button>
  </div>
</form>

@endsection
