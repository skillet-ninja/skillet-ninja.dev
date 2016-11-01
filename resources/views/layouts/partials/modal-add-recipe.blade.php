<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        
        <h2>Start A New Recipe</h2>

        <form class="form" action="{{ action('RecipesController@store') }}" method="POST" id="recipeUpdate" name="recipeUpdate">  
            {!! csrf_field() !!}
        
            <div class="form-group">
                <label for="recipeName">Recipe Name</label>
                <input class="form-control" id="name" type="text" name="name" value ="{{ old('name') }}" placeholder="Enter recipe name">
                <br>
            </div>

            <div class="form-group">
                <label for="summary">Summary</label>
                <textarea placeholder="Please write a short description of the recipe." class="form-control" id="summary" name="summary" rows="3">{{ old('summary') }}</textarea>
                <br>
            </div>

            <div class="row">

            <div class="col-sm-4">
                <div class="form-group">
                    <label>Difficulty</label>
                    <select class="form-control" name="difficulty">
                        <option value="beginner" selected>Beginner</option>
                        <option value="intermediate">Intermediate</option>
                        <option value="advanced">Advanced</option>
                    </select>
                    <br>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <label for="Servings">Servings</label>
                    <input class="form-control" id="servings" type="text" name="servings" value ="{{ old('servings') }}" placeholder="Number of servings">
                    <br>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <label for="overall_time">Total Time</label>
                    <input placeholder="Number of minutes" id="overall_time" class="form-control" type="text" name="overall_time"value ="{{ old('overall_time') }}">
                    <br>
                </div>
            </div>
            </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="image_url">Image Link</label>
                    <input type="url" id="image_url" name="image_url" value="{{ old('image_url') }}" placeholder="Link to image" class="form-control">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="video_url">Video Link</label>
                    <p>Add to database table</p>
                    <input type="url" id="video_url" name="video_url" value="{{ old('video_url') }}" placeholder="Link to video" class="form-control">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="notes">Additional notes</label>
            <br>
            <textarea class="form-control" id="notes" placeholder="Please enter any additional information." name="notes" rows="3" >{{ old('notes') }}</textarea>
            <br>
        </div>
        
            {{-- Buttons --}}
            <div class="row">
                <div class="col-md-4">
                    <button class="btn btn-success" id="ingredient-submit">Save Changes</button>
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            
        </form> <!-- form  -->
    </div> <!-- .col-sm-8 .col-sm-offset-2 -->
</div> <!-- .row -->

@include ('errors.list')