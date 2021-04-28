@extends('admin.layout.admin-layout')

@section('content')

    <a class="btn btn-secondary" href="{{route('index')}}">
        User oldal
    </a>

    @if($errors->first('email'))
        <p style="color:red">{{$errors->first('email')}}</p>
    @endif

    <h1>Admin belépés</h1>
    <form action="{{route('admin.login.store')}}" method="POST">
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
