{{-- Initial recipe creation --}}

    @include ('errors.list')

    @if(!isset($recipe_id))
        <form class="form" action="{{ action('RecipesController@store')}}" method="POST" id="recipeCreate" name="recipeCreate">
            {!! csrf_field() !!}
            <label for="recipeName">Recipe Name</label>
            <br>
            <input class="form-control" id="name" type="text" name="name" placeholder="Enter recipe name" value="{{ old('name') }}">
            <br>

            <label for="summary">Summary</label>
            <br>
            <textarea placeholder="Please write a short description of the recipe." class="form-control" id="summary" name="summary" rows="3">{{ old('summary') }}</textarea>
            <br>

            <label>Difficulty</label>
            <select class="form-control" name="difficulty">
                <option value="beginner" selected>Beginner</option>
                <option value="intermediate">Intermediate</option>
                <option value="advanced">Advanced</option>
            </select>
            <br>

            <label>Servings</label>
            <select class="form-control" name="servings">
                <option value="1">1</option>
                <option value="2" selected>2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="25">25</option>
            </select>
            <br>

            <label for="timeToPrep">Time</label>
            <input placeholder="Number of minutes" id="timeToPrep" class="form-control" type="text" name="overall_time">
            <br>
            <label for="notes">Additional notes</label>
            <br>
            <textarea class="form-control" id="notes" placeholder="Please enter any additional information." name="notes" rows="3"></textarea>
            <br>

            <button class="btn btn-success customButtonStyle" id="recipe-submit">Submit</button>
            <a href="{{ action('UsersController@show' , Auth::id()) }}" class="btn btn-danger pull-right">Cancel</a>
        </form>
    @endif
