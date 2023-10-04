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
        <div id="carouselExample" class="carousel slide">
          <div class="carousel-inner">

            @foreach ($product->images as  $key => $image)
            @if (str_ends_with($image->path,'.mp4'))
            <div class="carousel-item {{$key==0 ? 'active' : ''}}">
              <video src="{{asset("images/$image->path")}}" class="d-block w-100" alt="{{$product->name}}" controls>
            </div>
            @else
            <div class="carousel-item {{$key==0 ? 'active' : ''}}">
              <img src="{{asset("images/$image->path")}}" class="d-block w-100" alt="{{$product->name}}">
            </div>
            @endif
           
            @endforeach
          </div>


          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>

      </div>
    </div>
@endsection