

<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        
        <h2>Edit</h2>


        <form class="form" action="{{ action('IngredientsController@update', $recipe->id) }}" method="POST" id="ingredientUpdate" name="ingredientUpdate">  {{-- Deliberate use of recipe id, see ingredients controller --}}

            {!! csrf_field() !!}
            {!! method_field('PUT') !!}
        
            <div class="row">

            <div class="col-sm-3">
                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input class="form-control" id="amount" type="text" name="amount" value ="{{ (old('amount) == null) ? $recipe->ingredients->ingredient->withPivot->amount : old('amount') }}" placeholder="Enter recipe name">
                </div>
            </div>

            <div class="col-sm-5">
                <div class="form-group">
                    <label for="ingredient">Ingredient</label>
                    <input class="form-control" id="ingredient" type="text" name="ingredient" value ="{{ (old('ingredient') == null) ? $recipe->ingredients->ingredient : old('ingredient') }}" placeholder="Ingredient Name">
                </div>
            </div>
            </div>

            <button class="btn btn-success" id="recipe-submit">Save Changes</button>

            <a href="{{ action('RecipesController@edit' , $recipe->id) }}" class="btn btn-danger pull-right">Cancel</a>
            <p></p>
            
        </form> <!-- form  -->
    </div> <!-- .col-sm-8 -->
</div> <!-- .row -->