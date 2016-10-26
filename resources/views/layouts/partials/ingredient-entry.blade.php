<form class="form" action="{{ action('IngredientController@store')}}" method="POST" id="ingredientCreate" name="ingredientCreate">
    
    {{-- New Ingredient Partial --}}
    <h3>Ingredients</h3>
    <label for="recipe-name" >Amount</label>
    <input id="recipe-name" type="text" name="amount">
    <label for="recipe-name" >Ingredient</label>
    <input id="recipe-name" type="text" name="ingredient">
    <button class="btn btn-success" id="ingredient-submit">Add Ingredient</button>


</form>