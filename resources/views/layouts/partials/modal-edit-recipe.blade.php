

<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <h2>Edit</h2>

        <form class="form" action="{{ action('RecipesController@update')}}" method="POST" id="recipeUpdate" name="recipeUpdate">
        {!! csrf_field() !!}
            
            <label for="recipeName">Recipe Name</label>
            <input class="form-control" id="name" type="text" name="name" value ="{{ (old('name') == null) ? $recipe->name : old('name') }}" placeholder="Enter recipe name">
            <br>

            <label for="summary">Summary</label>
            <textarea placeholder="Please write a short description of the recipe." class="form-control" id="summary" name="summary" rows="3">{{ (old('summary') == null) ? $recipe->summary : old('summary') }}</textarea>
            <br>
            
            <div class="col-sm-2">
                <label>Difficulty</label>
                <select class="form-control" name="difficulty">
                    <option value="beginner" selected>Beginner</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="advanced">Advanced</option>
                </select>
                <br>
            </div>

            <div class="col-sm-2">
                <label for="Servings">Servings</label>
                <input class="form-control" id="servings" type="text" name="servings" value ="{{ (old('servings') == null) ? $recipe->servings : old('servings') }}" placeholder="Number of servings">
                <br>
            </div>

            <div class="col-sm-2">
                <label for="overall_time">Total Time</label>
                <input placeholder="Number of minutes" id="overall_time" class="form-control" type="text" name="overall_time"value ="{{ (old('overall_time') == null) ? $recipe->overall_time : old('overall_time') }}">
                <br>
            </div>



            <label for="notes">Additional notes</label>
            <br>
            <textarea class="form-control" id="notes" placeholder="Please enter any additional information." name="notes" rows="3" >{{ (old('notes') == null) ? $recipe->notes : old('notes') }}</textarea>
            <br>

            <button class="btn btn-success" id="recipe-submit">Save Changes</button>

            <a href="{{ action('RecipesController@edit' , $recipe->id) }}" class="btn btn-danger pull-right">Cancel</a>
            <p></p>
            
        </form> <!-- form  -->
    </div> <!-- .col-sm-8 -->
</div> <!-- .row -->

@include ('errors.list')