@extends('frontend.layout.application')

@section('content')

    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Név</th>
            <th scope="col">E-mail</th>
            <th scope="col">Telefonszám</th>
            <th scope="col">Módosítás dátuma</th>
            <th scope="col">Regisztráció</th>
            <th scope="col">Műveletek</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $customer)
            <tr id="customer-{{$customer->id}}">
                <th scope="row">{{$customer->id}}</th>
                <td>{{$customer->name}}</td>
                <td>{{$customer->email}}</td>
                <td>
                    @if($customer->phone)
                        {{$customer->phone}}
                    @else
                        Nincs megadva
                    @endif
                </td>
                <td>{{$customer->lastUpdatedAt()}}</td>
                <td>{{$customer->created_at}}</td>
                <td><a href="{{route('customer.show', ['customerId' => $customer->id])}}">Megtekintés</a> |
                    <a href="{{route('customer.edit', ['customerId' => $customer->id])}}">Módosítás</a> |
                    <br>
                    <form method="POST"
                          action="{{ route('customer.destroy', $customer->id)}}"
                          class="d-inline">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" value="Törlés" class="btn btn-danger">
                    </form>
                    |
                    <button class="btn btn-danger button-delete-customer d-inline"
                            data-token="{{csrf_token()}}"
                            data-id="{{$customer->id}}"
                            data-url="{{route('customers.destroyWithJson', $customer->id)}}">
                        Törlés (Json)
                    </button>
                    |
                    <button class="btn btn-danger del-contact-person-button-sw d-inline"
                            data-token="{{csrf_token()}}"
                            data-id="{{$customer->id}}"
                            data-url="{{route('customers.destroyWithJson', $customer->id)}}">
                        Törlés (Sweet)
                    </button>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
