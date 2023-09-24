@extends('prod.layouts.master')
@section('title')
    Create New Product
@endsection
@section('content')
    <form action="{{route('products.store')}}" class="row" method="POST" onsubmit="return confirm('Are you sure you want to add this product!?')">
        @csrf
        @method("POST")
        <div class="col-6">
            <label for="number">Product Number</label>
            <input type="text" id="number" name="number" class="form-control">
        </div>

        <div class="col-6">
            <label for="name">Product Name</label>
            <input type="text" id="name" name="name" class="form-control">
        </div>

        <div class="col-6">
            <label for="price">Product Price</label>
            <input type="text" id="price" name="price" class="form-control">
        </div>

        <div class="col-6">
            <label for="brand">Product Brand</label>
            <input type="text" id="brand" name="brand" class="form-control">
        </div>

        <button type="submit" class="btn btn-success btn-sm mt-2">Add</button>
    
    </form>
@endsection