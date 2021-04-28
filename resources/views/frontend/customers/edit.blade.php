@extends('frontend.layout.application')

@section('content')

    <h1>Ügyfél módosítása</h1>

    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @else
        @include('frontend.customers.form')
    @endif

@stop

@section('footer')
    <footer>
        All right reserved.
    </footer>
@stop
