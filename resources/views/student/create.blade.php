@extends('layouts.master')
@section('content')
<form action="{{route('students.store')}}" method="POST" class="row g-3 needs-validation" novalidate>
  @csrf
  @method("POST")
  <div class="mb-3 col-12">
      <label for="exampleFormControlInput1" class="form-label">student Name</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="exampleFormControlInput1" placeholder="student Name" value="{{old('name')}}">
      @error('name')<div class="text-danger">{{ $message }}</div> @enderror
      
  </div>
  <div class="mb-3 col-6">
      <label for="exampleFormControlInput1" class="form-label">University ID</label>
      <input type="number" class="form-control @error('uni_id') is-invalid @enderror" name="uni_id" id="exampleFormControlInput1" placeholder="University ID" value="{{old('uni_id')}}">
      @error('uni_id')<div class="text-danger">{{ $message }}</div> @enderror
  </div>
  <div class="mb-3 col-6">
      <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
      <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="exampleFormControlInput1" placeholder="Phone Number" value="{{old('phone')}}">
      @error('phone')<div class="text-danger">{{ $message }}</div> @enderror
  </div>

  <div class="mb-3 col-12">
      <button type="submit" class="btn btn-primary d-block">Add</button>
  </div>
</form>

@endsection