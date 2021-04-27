@extends('frontend.layout.application')

@section('content')

    <form method="POST" action="{{route('register')}}">
        @csrf
        Név: <input type="text" name="name" value="{{old('name')}}">
        @if($errors->first('name'))
            <p style="color:red">
                {{$errors->first('name')}}
            </p>
        @endif
        <br>
        Jelszó: <input type="password" name="password">
        @if($errors->first('password'))
            <p style="color:red">
                {{$errors->first('password')}}
            </p>
        @endif
        <br>
        Jelszó újra: <input type="password" name="password_confirmation">

        <br>
        <input type="submit" value="Küldés">
    </form>
@stop

@section('footer')
    <footer>
        All right reserved.
    </footer>
@stop
