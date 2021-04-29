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

    <h1>Ügyféllista</h1>
    <form action="{{route('customer.index')}}" method="GET">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                {{--<th scope="col">#</th>--}}
                <th scope="col">Név</th>
                <th scope="col">E-mail</th>
                <th scope="col">Telefonszám</th>
                <th scope="col">Jegyzetek</th>
                <th scope="col">Módosítás</th>
                <th scope="col">Regisztráció</th>
                <th scope="col">Műveletek</th>
            </tr>
            <tr>
                {{-- <td><input type="text" name="search[id]"></td>--}}
                <td><input type="text"
                           placeholder="Keresés"
                           name="search[name]"
                           value="{{isset($search['name']) && $search['name'] ? $search['name']:''}}"></td>
                <td><input type="text"
                           placeholder="Keresés"
                           name="search[email]"
                           value="{{isset($search['email']) && $search['email'] ? $search['email']:''}}"></td>
                <td><input type="text"
                           placeholder="Keresés"
                           name="search[phone]"
                           value="{{isset($search['phone']) && $search['phone'] ? $search['phone']:''}}"></td>
                <td></td>
                <td></td>
                <td><input type="submit" value="Keresés">
                    <a role="button" class="btn btn-default" href="{{route('customer.index')}}"
                       title="Keresési feltételek törlése"><i class="fa fa-sync"></i></a></td>
            </tr>
            </thead>
            <tbody>
            @foreach($customers as $customer)
                <tr id="customer-{{$customer->id}}">
                    {{--<th scope="row">{{$customer->id}}</th>--}}
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->email}}</td>
                    <td>
                        @if($customer->phone)
                            {{$customer->phone}}
                        @else
                            Nincs megadva
                        @endif
                    </td>
                    <td><a href="{{route('note.list', $customer->id)}}">
                            Jegyzetek</a>
                        ({{$customer->notes->count()}} db)
                    </td>
                    <td>{{$customer->lastUpdatedAt()}}</td>
                    <td>{{$customer->created_at}}</td>
                    <td><a href="{{route('customer.show', ['customerId' => $customer->id])}}">Megtekintés</a> |
                        <a href="{{route('customer.edit', ['customerId' => $customer->id])}}">Módosítás</a> |
                        <br>
                        {{--<form method="POST"
                              action="{{ route('customer.destroy', $customer->id)}}"
                              class="d-inline">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" value="Törlés" class="btn btn-danger">
                        </form>--}}
                        |
                        <button class="btn btn-danger button-delete-customer d-inline mb-1"
                                data-token="{{csrf_token()}}"
                                data-id="{{$customer->id}}"
                                data-url="{{route('customer.destroyWithJson', $customer->id)}}">
                            Törlés (Json)
                        </button>
                        |
                        <button class="btn btn-danger del-contact-person-button-sw d-inline"
                                data-token="{{csrf_token()}}"
                                data-id="{{$customer->id}}"
                                data-url="{{route('customer.destroyWithJson', $customer->id)}}">
                            Törlés (Sweet)
                        </button>
                </tr>
            @endforeach
            </tbody>
        </table>
    </form>
@stop
