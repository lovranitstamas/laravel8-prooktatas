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


    <p><a href="{{route('note.create')}}">Jegyzet létrehozása</a> |</p>

    <form action="{{route('note.list')}}" method="GET">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Ügyfél</th>
                <th scope="col">Tartalom</th>
                <th scope="col">Módosítás</th>
                <th scope="col">Regisztráció</th>
                <th scope="col">Műveletek</th>
            </tr>
            </thead>
            <tbody>
            @foreach($notes as $note)
                <tr id="note-{{$note->id}}">
                    <th scope="row">{{$note->id}}</th>
                    <td>{{$note->customer->name}}</td>
                    <td>{{$note->content}}</td>
                    <td>{{$note->updated_at}}</td>
                    <td>{{$note->created_at}}</td>
                    <td>
                        {{--<a href="{{route('note.show', ['noteId' => $note->id])}}">Megtekintés</a> |
                        <a href="{{route('note.edit', ['noteId' => $note->id])}}">Módosítás</a> |--}}
                        {{--<button class="btn btn-danger del-note-button-sw d-inline"
                                data-token="{{csrf_token()}}"
                                data-id="{{$note->id}}"
                                data-url="{{route('note.destroyWithJson', $note->id)}}">
                            Törlés (Sweet)
                        </button>--}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </form>
@stop
