@extends('layouts.master')
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
            <td>Is Available</td>
            <td style="width: 200px" >Actions</td>
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
                  
                

                  @if ($product->is_available)
                  <span class="badge text-bg-success">
                  {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                  </svg> --}}
                  متوفر
                </span>
                  @else
                  <span class="badge text-bg-danger">
                  {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                  </svg> --}}
                  غير متوفر
                </span>
                  @endif
                 
                </td>
                <td style="width: 200px">
                    <a href="{{route('products.show',$product)}}" class="btn btn-sm btn-primary">show</a>
                    <a href="{{route('products.edit',$product)}}" class="btn btn-sm btn-primary">edit</a>
                    <a href="{{route('products.toggleAvailablity',$product)}}" class="btn btn-sm btn-primary">Change Availablity</a>
                    <form method="POST" action="{{ route('products.destroy', $product) }}" onsubmit=" return confirm('Are you sure!?') " class="d-inline">
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