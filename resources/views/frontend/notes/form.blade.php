<form method="POST"
      action="{{ $note->id ? '' : route('note.store')}}">

    @if($note->id)
        <input type="hidden" name="_method" value="PUT">
    @endif

    @csrf

    <p>Jegyzet:</p>
    <textarea cols="60" rows="10" name="content"></textarea>
    @if($errors->first('content'))
        <p style="color:red">
            {{$errors->first('content')}}
        </p>
    @endif

    <br>
    Címkék:
    <br><br>
    <select name="tags[]" multiple style="width: 300px">
        @foreach($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->name}}</option>
        @endforeach
    </select>

    <br><br>
    <input type="submit" value="{{ $note->id ? 'Módosítás ' : 'Mentés'}}"
           class="btn btn-primary">

    <p class="mt-2">
        <a class="btn btn-secondary" href="{{route('note.list')}}">
            Vissza
        </a>
    </p>
</form>
