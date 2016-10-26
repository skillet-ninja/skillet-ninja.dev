
@if(isset($recipe_id)&&isset($ingredient_Id))
    <form method="" action="">
        {{-- New Step Partial --}}
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

    </form>
@endif