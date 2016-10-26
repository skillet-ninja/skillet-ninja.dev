
<div class="modal-body">

<div class="title-rating">
    <h2 class="modal-name">{{ $recipe->name }}</h2>
</div>

<h4 class="modal-author">Submitted by <strong>{{ $recipe->user->name}}</strong></h4>

<dl>
    <dt>Description</dt>
    <dd>{{ $recipe->summary }}</dd>
</dl>

<div class="row">
    <div class="col-md-3 rounded-list">
        <h1>Ingredients</h1>
        <ol>
            @foreach ($recipe->ingredients as $ingredient)
            <li><a href="#">{{ $ingredient->ingredient }}</a></li>
            @endforeach
        </ol>
    </div>


    <div class="col-md-8 rounded-list">
        <h1>Steps</h1>
        <ol>
            @foreach ($recipe->steps as $step)
                <li><a href="#">{{ $step->step }}</a></li>
            @endforeach
        </ol>

    </div>            
</div>
<a href="{{ action('RecipesController@show', $recipe->id) }}" class="btn btn-primary pull-right">SKILLET!</a>

</div>
