@extends ('layouts.master')

@section ('content')
    <h1 class="h1 text-center">Recipe Creator</h1>

    <label for="recipe-name" >Recipe Name</label>
    <br>
    <input id="recipe-name" type="text" name="#">
    <br>

    <label for="summary" >Summary</label>
    <br>
    <input id="summary" type="text" name="#">
    <br>

    <label>Please select a level of difficulty</label>
    <select class="form-control">
        <option value="beginner" selected>Beginner</option>
        <option value="intermediate">Intermediate</option>
        <option value="advanced">Advanced</option>
    </select>

    <label>Please select the approx. number of servings</label>
    <select class="form-control">
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

    <label for="time-to-prep" >Minutes to prepare</label>
    <input id="time-to-prep" type="text" name="#">
    <br>

    <h3>Ingredients</h3>

    <label for="recipe-name" >Amount</label>
    <input id="recipe-name" type="text" name="#">

    <label for="recipe-name" >Ingredient</label>
    <input id="recipe-name" type="text" name="#">

    <button class="btn btn-primary">Add Ingredient</button>

    <h3>Steps</h3>

    <label for="step">Please enter a specific instruction, e.g. "Stir occasionally until golden brown."</label>
    <br>
    <input id="recipe-name" type="text" name="#">
    <br>

    <label for="step" >Timer (if needed)</label>
    <input id="recipe-name" type="text" name="#">

    <label for="step" >Video URL (if needed)</label>
    <input id="recipe-name" type="text" name="#">
    
    <label for="step" >Image URL (if needed)</label>
    <input id="recipe-name" type="text" name="#">

    <button class="btn btn-primary">Add Step</button>
    <br>
    
    <label>Keywords</label>
    <br>
    <textarea placeholder="Please enter any relevant keywords seperated by commas, e.g. 'vegan, savory, etc.' "></textarea>
    <br>

    <label>Additional notes</label>
    <br>
    <textarea placeholder="Please enter any additional information."></textarea>

    <br>
    <button class="btn btn-danger">Cancel</button>

    <button class="btn btn-success pull-right">Submit</button>
    

@stop