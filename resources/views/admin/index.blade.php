@extends('admin.layout.admin-layout')

@section('content')
    <h1>Admin board</h1>

    <h2>Hello: {{auth('admin')->user()->name}}</h2>

    <form action="{{route('admin.logout')}}" method="POST">
        @csrf
        <div class="form-group">
            <button type="submit" class="btn btn-primary m-3">Kilépés</button>
        </div>
    </form>
@stop
