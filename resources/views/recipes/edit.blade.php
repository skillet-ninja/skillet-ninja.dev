@extends ('layouts.master')

@section ('title', 'Recipe Editor')

@section ('content')
    <h1 class="h1 text-center">Recipe Editor</h1>
    <hr/>

    <div class="row">
        <div class="col-md-4">
            <img src="{{$recipe->image_url}}" class="thumbnail" alt="recipe image">
        </div>
        <div class="col-md-4">
            <h1>{{ $recipe->name }}</h1>
            <p><em>{{ $recipe->summary }}</em></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <p><span class="recipe-data"><strong>SERVINGS</strong> {{ $recipe->servings }}</span>
               <span class="recipe-data"><strong>Total Time</strong> {{ $recipe->overall_time }}</span></p>
            <p><span class="recipe-data"><strong>Tags</strong>
                @foreach ($recipe->tags as $tag)
                    {{ $tag->tag }}
                @endforeach

        </div>

    </div>

    {{-- {!! dd($recipe->ingredients); !!} --}}


    @foreach($recipe->ingredients as $i)
    	<div class="ingredient">
	    	<label for="name-ingredient-{{$i->id}}">Ingredient Name</label>
	    	<input type=text name="name-ingredient-{{$i->id}}" value="{{$i->ingredient}}">
	    	<label for="name-ingredient-{{$i->id}}">Amount</label>
	    	<input type=text name="name-ingredient-{{$i->id}}" value="{{$i->pivot->amount}}">
	    	<br/>	
	    </div>

    @endforeach


    //With jquery, get all ingredients


    <script>
    	var ingredients[];

    	//each ingredient 
    	var ingredient = {
    		id: "id",
    		name: "name",
    		amount: "amont"
    	}
    </script>


    {{-- @include('layouts.partials.recipe-entry') --}}

    {{-- @include('layouts.partials.ingredient-entry') --}}

    {{-- @include('layouts.partials.step-entry') --}}




@stop