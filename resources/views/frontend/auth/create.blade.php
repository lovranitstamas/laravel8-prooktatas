@extends('frontend.layout.application')

@section('content')
    <form action="{{route('login.store')}}" method="POST">
        @csrf
        <p>
            E-mail <input type="text" name="email" value="{{old('email')}}">
        </p>
        <p>
            Jelszó <input type="password" name="password">
        </p>
        <p>
            <button type="submit">Belépés</button>
        </p>
    </form>
@endsection
