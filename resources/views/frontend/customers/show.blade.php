@extends('frontend.layout.application')

@section('content')
    <h1>Ügyfél: {{$customer->name}}</h1>
    <p>Azonosító: {{$customer->id}}</p>
    <p>Email: {{$customer->email}}</p>
    <p>{{$customer->phone}}</p>
@stop
