@extends('prod.layouts.master')
@section('title')
    Edit Product {{ $product->number }}
@endsection
@section('content')
<form action="{{route('products.update',$product)}}" class="row" method="POST">
    @csrf
    @method("PUT")
    <div class="col-6">
        <label for="number">Product Number</label>
        <input type="text" id="number" name="number" class="form-control" value="{{ $product->number }}">
    </div>

    <div class="col-6">
        <label for="name">Product Name</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ $product->name }}">
    </div>

    <div class="col-6">
        <label for="price">Product Price</label>
        <input type="text" id="price" name="price" class="form-control" value="{{ $product->price }}">
    </div>

    <div class="col-6">
        <label for="brand">Product Brand</label>
        <input type="text" id="brand" name="brand" class="form-control" value="{{ $product->brand }}">
    </div>

    <button type="submit" class="btn btn-success btn-sm mt-2">Update</button>

</form>
@endsection