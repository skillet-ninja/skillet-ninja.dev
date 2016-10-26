<form class="form" action="{{ action('IngredientController@store')}}" method="POST" id="ingredientCreate" name="ingredientCreate">
{!! csrf_field() !!}
    
    {{-- New Ingredient Partial --}}
    @if(isset($recipe_id)&&!isset($ingredient_Id))
        <h3>Ingredients</h3>
	    <input type="hidden" name="recipe_id" value="{{ $recipe_id }}">
	    <label for="recipe-name" >Amount</label>
	    <input type="text" name="amount">
	    <label for="recipe-name" >Ingredient</label>
	    <input type="text" name="ingredient">
	    <button class="btn btn-success" id="ingredient-submit">Submit Ingredients</button>
    @endif


</form>