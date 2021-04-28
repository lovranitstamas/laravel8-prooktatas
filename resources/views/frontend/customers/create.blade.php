@extends('frontend.layout.application')

@section('content')

    <h1>Regisztráció</h1>

    @if(session()->has('success'))
        <h2>{{session('success')}}</h2>
    @else
        @include('frontend.customers.form')
    @endif

@stop

@section('footer')
    <footer>
        All right reserved.
    </footer>
@stop
