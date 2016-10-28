



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
        <form class="form-inline">
            <div class="form-group">
                <input type="hidden" name="recipe_id" value="{{ $recipe_id }}">
                <label class="sr-only" for="ingredientName">Ingredient</label>
                <input id="ingredientName" class="form-control" type="text" name="ingredient" placeholder="Enter ingredient">
            </div>
            <div class="form-group">
                <label class="sr-only" for="amountName">Amount</label>
                <input id="amountName" class="form-control" type="text" name="amount" placeholder="Enter amount">
            </div>
            <button class="btn btn-success" id="ingredient-submit">Add</button>
        </form>


    @endif


</form>

@if(isset($recipe_id))
    <button id="toStepEntry" class="btn btn-primary center-block">Next</button>
@endif
