<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        
        <h2>Edit</h2>
        <form class="form" action="{{ action('IngredientController@update') }}" method="POST" id="ingredientUpdate" name="ingredientUpdate">

            {!! csrf_field() !!}
            {!! method_field('PUT') !!}

            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input class="form-control" id="amount" type="text" name="amount" placeholder="Amount"
                        value="{{ (old('amount') == null) ? $ingredient->pivot->amount : old('amount') }}">
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="ingredient">Ingredient</label>
                        <input class="form-control" id="ingredient" type="text" name="ingredient" placeholder="Ingredient Name"
                        value="{{ (old('ingredient') == null) ? $ingredient->ingredient : old('ingredient') }}">
                    </div>
                </div>
            </div> <!-- .row -->

        {{-- Buttons --}}
        <div class="row">
            <div class="col-md-4">
                <input type="hidden" id="ingredientId" name="ingredientId" value="{{ $ingredient->id }}">
                <input type="hidden" id="recipeId" name="recipeId" value="{{ $recipe->id }}">
                <button class="btn btn-success" id="ingredient-submit">Save Changes</button>
            </div>
            <div class="col-md-4">

                <form class="form" action="ingredients/{{ $ingredient->id }}" method="POST">
                    {!! csrf_field() !!}
                    {!! method_field('DELETE') !!}
                    <input type="hidden" id="recipeId" name="recipeId" value="{{ $recipe->id }}">
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div> <!-- .row -->
            <p></p>

        </form> <!-- form  -->
    </div> <!-- .col-sm-8 -->
</div> <!-- .row -->