{{-- Initial recipe creation --}}
<form action="" method="" id="" name="recipeCreate">
    <label for="recipeName" >Recipe Name</label>
    <br>
    <input id="recipeName" type="text" name="recipeName" value="John">
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

    <label for="timeToPrep" >Minutes to prepare</label>
    <input id="timeToPrep" type="text" name="#">
    <br>

    <button class="btn btn-success" id="recipe-submit">Submit</button>
    <button class="btn btn-danger">Cancel</button>


</form>