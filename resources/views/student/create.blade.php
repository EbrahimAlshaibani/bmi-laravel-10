@extends('layouts.master')

@section('content')
<form action="{{route('students.store')}}" method="POST" class="row g-3 needs-validation" enctype="multipart/form-data">
  @csrf
  @method("POST")
    <div class="col-md-4">
        <h4>Image Picker</h4>
        <label class="custom-file-label" for="imageInput">Choose an image</label>
        <input type="file" name="image" class="custom-file-input" id="imageInput" accept="image/*" style="display: none;">
    </div>
    <div class="col-md-4">
        <h4>Image Preview</h4>
        <img src="" alt="Preview" id="imagePreview" class="img-thumbnail">
    </div>


  <div class="mb-3 col-9">
      <label for="exampleFormControlInput1" class="form-label">Student Name</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="exampleFormControlInput1" placeholder="Student Name" value="{{old('name')}}">
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
<style>
    .custom-file-label::after {
    content: "Browse";
}

</style>
<script>
   function updateImagePreview(input) {
       if (input.files && input.files[0]) {
           const reader = new FileReader();

           reader.onload = function (e) {
               $('#imagePreview').attr('src', e.target.result);
           }

           reader.readAsDataURL(input.files[0]);
       }
   }

   // Trigger the image preview when a file is selected
   $('#imageInput').change(function () {
       updateImagePreview(this);
       // You can add additional logic here to handle the file as needed
   });

   // Click the hidden file input when the label is clicked
   $('label[for="imageInput"]').click(function () {
       $('#imageInput').click();
   });

</script>
@endsection