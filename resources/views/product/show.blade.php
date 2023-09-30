@extends('layouts.master')
@section('title')
    Product {{$product->number}}
@endsection
@section('content')
    <div class="card text-start mt-2">
      {{-- <img class="card-img-top" src="holder.js/100px180/" alt="Title"> --}}
      <div class="card-body">
        <h4 class="card-title">{{$product->number}}</h4>
        <h4 class="card-title">{{$product->name}}</h4>
        <p class="card-text">{{$product->price}} | {{$product->brand}} </p>
        @foreach ($product->images as $image)
            <img src="{{asset("images/$image->path")}}" alt="" width=100>
        @endforeach

      </div>
    </div>
@endsection