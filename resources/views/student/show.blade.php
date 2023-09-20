@extends('layouts.master')
@section('content')
    <ul>
        <li>{{$student->name}}</li>
        <li>{{$student->uni_id}}</li>
        <li>{{$student->phone}}</li>
    </ul>
@endsection