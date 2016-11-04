{{-- Modal Body --}}

<div class="modal-body">

{{-- Title and Creator --}}

<div class="row">
    <div class="col-md-8 col-md-offset-2">
<h2 class="text-center text-capitalize">{{ $recipe->name }}</h2>
<h4 class="modal-author">Submitted by <strong>{{ $recipe->user->name}}</strong></h4>
    </div>
</div>


{{-- Description  --}}
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <p class="lead">{{ $recipe->summary }}</p>
    </div>
</div>

<div class="row">

    {{-- Ingredients --}}
    <div class="col-md-3 col-md-offset-1 rounded-list">
        <h3>Ingredients</h3>
        <ol>
            @foreach ($recipe->ingredients as $ingredient)
            <li><a href="#">{{$ingredient->pivot->amount}}  {{ $ingredient->ingredient }}</a></li>
            @endforeach
        </ol>
    </div>

    {{-- Steps --}}
    <div class="col-md-7 rounded-list">
        <h3>Steps</h3>
        <ol>
            @foreach ($recipe->steps as $step)
                <li><a href="#">{{ $step->step }}</a></li>
            @endforeach
        </ol>
    </div>  

</div>

{{-- Notes       --}}
<div class="row">
    <div class="col-md-2">
        <h3 class="text-right">Notes</h3>
    </div>
    <div class="col-md-8">
        <p class="lead">{{ $recipe->notes }}</p>
    </div>
</div>

{{-- Tags  --}}
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        @foreach ($recipe->tags as $tag)
            <a class="btn btn-default customTagStyle text-left" href="{{ URL::route('sortRecipes') }}?search_tag={{ $tag->tag }}" target="_blank">#{{ $tag->tag }}</a>
        @endforeach
    </div>
</div>

{{-- Score  --}}
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <p></p>
        <h4 class="text-center">Community Rating  {{ $recipe->vote_score }}</h4>
    </div>
</div>

{{-- Modal Footer --}}

<div class="modal-footer">
    <button id="closeModal" type="button" class="btn btn-default customButtonStyle pull-left" data-dismiss="modal">Close</button>

    @if(Auth::check() && $vca != true)
        <a href="{{ action('RecipesController@show', $recipe->id) }}" class="btn btn-primary btn-success pull-right customButtonStyle">START!</a>
    @elseif ($vca != true)
        <a href="/auth/login" class="btn btn-primary btn-success pull-right stopSkilletButton customButtonStyle">START!</a>
    @endif

</div>