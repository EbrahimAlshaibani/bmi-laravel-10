@extends('prod.layouts.master')
@section('title')
     Products
@endsection
@section('content')

    <a href="{{ route("products.create") }}" class="btn btn-success btn-sm">Add Product</a>

    @if ($products->count()==0)
        <div class="alert alert-light alert-dismissible fade show mt-2" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Sorry</strong> There are no data yet
        </div>
    @else
   

    <table class="table">
        <thead>
          <tr>
            <td>Product Number</td>
            <td>Product Name</td>
            <td>Product Price</td>
            <td>Product Brand</td>
            <td>Actions</td>
          </tr>
        </thead>
        <tbody>

              @foreach ($products as $product)
              <tr>
                <td>{{$product->number}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->brand}}</td>
                <td>
                    <a href="{{route('products.show',$product)}}" class="btn btn-sm btn-primary">show</a>
                    <a href="{{route('products.edit',$product)}}" class="btn btn-sm btn-primary">edit</a>
                    <form method="POST" action="{{ route('products.destroy', $product) }}" onsubmit=" return confirm('Are you sure!?') ">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
              </tr>
              @endforeach
        </tbody>
    </table>
    @endif

@endsection