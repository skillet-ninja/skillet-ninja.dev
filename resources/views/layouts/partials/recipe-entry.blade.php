{{-- Initial recipe creation --}}

    @if ($errors->has('name'))
        {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
    @endif

    @if ($errors->has('servings'))
        {!! $errors->first('servings', '<span class="help-block">:message</span>') !!}
    @endif

    @if ($errors->has('summary'))
        {!! $errors->first('summary', '<span class="help-block">:message</span>') !!}
    @endif
    @if ($errors->has('difficulty'))
        {!! $errors->first('difficulty', '<span class="help-block">:message</span>') !!}
    @endif
    @if ($errors->has('overall_time'))
        {!! $errors->first('overall_time', '<span class="help-block">:message</span>') !!}
    @endif
<form class="form" action="{{ action('RecipesController@store')}}" method="POST" id="recipeCreate" name="recipeCreate">
    {!! csrf_field() !!}
    <label for="recipeName" >Recipe Name</label>
    <br>
    <input class="form-control" id="name" type="text" name="name" placeholder="Name your creation" value="{{ old('name') }}">
    <br>

    <label for="summary" >Summary</label>
    <br>
    <textarea class="form-control" id="summary" name="summary" rows="3">{{ old('summary') }}</textarea>
    <br>

    <label>Please select a level of difficulty</label>
    <select class="form-control" name="difficulty">
        <option value="beginner" selected>Beginner</option>
        <option value="intermediate">Intermediate</option>
        <option value="advanced">Advanced</option>
    </select>

    <label>Please select the approx. number of servings</label>
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

    <label for="timeToPrep" >Minutes to prepare</label>
    <input id="timeToPrep" type="text" name="overall_time">
    <br>

    <button class="btn btn-success" id="recipe-submit">Submit</button>
    <button class="btn btn-danger">Cancel</button>


</form>