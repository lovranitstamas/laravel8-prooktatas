<form method="POST" action="{{route('customer.store')}}">
    @csrf

    Név: <input type="text" name="name" value="{{old('name')}}">
    @if($errors->first('name'))
        <p style="color:red">
            {{$errors->first('name')}}
        </p>
    @endif
    <br>

    E-mail: <input type="email" name="email" value="{{old('email')}}">
    @if($errors->first('email'))
        <p style="color:red">
            {{$errors->first('email')}}
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

    <label>
        <input type="checkbox" name="terms" value="1" {{old('terms') ? 'checked': ''}}>
        Elfogadok mindent
    </label>
    @if($errors->first('terms'))
        <p style="color:red">
            {{$errors->first('terms')}}
        </p>
    @endif

    <br>
    <input type="submit" value="Regisztráció">
</form>
