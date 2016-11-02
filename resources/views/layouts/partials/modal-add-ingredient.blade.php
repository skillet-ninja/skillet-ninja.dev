<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        
        <h2>Edit</h2>

        <form class="form" action="{{ action('IngredientController@store') }}" method="POST">
            {!! csrf_field() !!}

            <div class="row">

            	{{-- Amount Input --}}
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input class="form-control" id="amount" type="text" name="amount" placeholder="Amount"
                        value="{{ old('amount') }}">
                    </div>
                </div>

                {{-- Ingredient Input --}}
                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="ingredient">Ingredient</label>
                        <input class="form-control" id="ingredient" type="text" name="ingredient" placeholder="Ingredient Name"
                        value="{{ old('ingredient') }}">
                    </div>
                </div>
                <input type="hidden" id="recipeId" name="recipeId" value="{{ $recipe->id }}">
            </div> <!-- .row -->
        
            <button type="Submit" class="btn btn-success customButtonStyle">Add Ingredient</button>
            <button type="button" class="btn btn-default customButtonStyle" data-dismiss="modal">Close</button>

            <p></p>
            
        </form> <!-- form  -->
    </div> <!-- .col-sm-8 -->
</div> <!-- .row -->