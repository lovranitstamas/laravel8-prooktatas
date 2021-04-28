@extends('frontend.layout.application')

@section('content')

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
            <tr>
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
                    <a href="">Törlés</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
