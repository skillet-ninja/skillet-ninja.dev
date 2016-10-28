@extends ('layouts.master')

@section ('title', 'Recipe Creator')

@section ('content')
    <h1 class="h1 text-center">Recipe Editor</h1>

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