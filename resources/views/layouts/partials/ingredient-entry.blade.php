



{{-- New Ingredient Partial --}}

@if(isset($ingredientsDisplayed))
	@foreach($ingredientsDisplayed as $ingredient)


		<p>{{ $ingredient->amount }}<p>
		<p>{{ $ingredient->ingredient }}</p>

	@endforeach
@endif


@if ($errors->has('ingredient'))
    {!! $errors->first('ingredient', '<span class="help-block">:message</span>') !!}
@endif

@if ($errors->has('amount'))
    {!! $errors->first('amount', '<span class="help-block">:message</span>') !!}
@endif


<form class="form" action="{{ action('IngredientController@store')}}" method="POST" id="ingredientCreate" name="ingredientCreate">
{!! csrf_field() !!}
    

    @if(isset($recipe_id)&&!isset($ingredient_Id))
        <h3>Ingredients</h3>
	    <input type="hidden" name="recipe_id" value="{{ $recipe_id }}">
	    <label for="recipe-name" >Amount</label>
	    <input type="text" name="amount">
	    <label for="recipe-name" >Ingredient</label>
	    <input type="text" name="ingredient">
	    <button class="btn btn-success" id="ingredient-submit">Add Ingredient</button>
    @endif


</form>