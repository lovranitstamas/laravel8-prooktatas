<form method="POST"
      action="{{ $note->id ?  route('note.update', $note->id) : route('note.store')}}">

    @if($note->id)
        <input type="hidden" name="_method" value="PUT">
    @endif

    @csrf

    <p>Jegyzet:</p>
    <textarea cols="60" rows="10" name="content"
    >{{old('content')?:$note->content}}</textarea>
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
            <option value="{{$tag->id}}"
                    @if(old('tags') &&
                        (collect(old('tags'))->contains($tag->id)) ? 'selected':'')
                    selected
                    @elseif(old('tags')===null && $note->hasTag($tag->id))
                    selected
                @endif
            >{{$tag->name}}</option>
        @endforeach
    </select>
    <p>@if($note->id && count($note->tags()->pluck('id')->toArray())==0) A jegyzethez nem tartozik tag @endif</p>

    <br><br>
    <input type="submit" value="{{ $note->id ? 'Módosítás ' : 'Mentés'}}"
           class="btn btn-primary">

    <p class="mt-2">
        <a class="btn btn-secondary" href="{{route('note.list')}}">
            Vissza
        </a>
    </p>
</form>
