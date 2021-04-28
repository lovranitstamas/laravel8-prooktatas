<div class="p-2">
    <a href="{{route('index')}}">Kezdőlap</a> |
    @if(authCustomer())
        <a href="{{route('customer.index')}}">Ügyféllista</a> |
    @endif
    @if(authCustomer())
        Belépve: {{authCustomer()->name }}
        <form action="{{route('login.destroy')}}" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            @csrf
            <button type="submit" class="btn btn-primary m-3">Kilépés</button>
        </form>
    @else
        <a href="{{route('customer.create')}}">Ügyfél regisztráció</a> |
        <a href="{{route('login.create')}}">Belépés</a> |
    @endif
</div>
