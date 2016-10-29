

@if(isset($recipe_id))

    @if(isset($tagsDisplayed))
        @foreach($tagsDisplayed as $tag)
            <p>{{ $tag->tag }}<p>
        @endforeach
    @endif

    <form class="form form-group" action="{{ action('TagController@store')}}" method="POST" id="tagCreate" name="tagCreate">
    {!! csrf_field() !!}
        <input class="form-control" type="hidden" name="recipe_id" value="{{ $recipe_id }}">
        <label for="keywordName">Keywords</label>
        <input id="keywordName" class="form-control" data-role="tagsinput" type="text" placeholder="" name="tag" value="">
        <button class="btn btn-primary">Add Tags</button>
    </form> 


    <a href="/home" class="btn btn-primary center-block">Done</a>

@endif