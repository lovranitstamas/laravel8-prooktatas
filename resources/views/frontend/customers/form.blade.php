<form method="POST"
      action="{{ $customer->id ? route('customer.update', $customer->id) : route('customer.store')}}">

    @if($customer->id)
        <input type="hidden" name="_method" value="PUT">
    @endif

    @csrf

    Név: <input type="text" name="name"
                value="{{old('name') ? old('name') : $customer->name}}">
    @if($errors->first('name'))
        <p style="color:red">
            {{$errors->first('name')}}
        </p>
    @endif
    <br>

    E-mail: <input type="email" name="email"
                   value="{{old('email')?: $customer->email}}">
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

    Telefonszám: <input type="text" name="phone"   value="{{old('email')?: $customer->phone}}">
    @if($errors->first('phone'))
        <p style="color:red">
            {{$errors->first('phone')}}
        </p>
    @endif
    <br>

    @if(!$customer->id)
        <label>
            <input type="checkbox" name="terms" value="1" {{old('terms') ? 'checked': ''}}>
            Elfogadok mindent
        </label>
        @if($errors->first('terms'))
            <p style="color:red">
                {{$errors->first('terms')}}
            </p>
        @endif
    @endif

    <br>
    <input type="submit" value="{{ $customer->id ? 'Módosítás ' : 'Regisztráció'}}">
</form>
