<div class="container-fluid">

    <div class="row">

        <div class="col-xs-12">
            <h1 class="text-center">Edit</h1>
            <form class="form" action="{{ action('RecipesController@update', $recipe->id) }}" method="POST">  

                {!! csrf_field() !!}
                {!! method_field('PUT') !!}
                <input type="hidden" id="recipeId" name="recipeId" value="{{ $recipe->id }}">
            
                <div class="form-group">
                    <label for="recipeName">Recipe Name</label>
                    <input class="form-control" id="name" type="text" name="name" value ="{{ (old('name') == null) ? $recipe->name : old('name') }}" placeholder="Enter recipe name">
                    <br>
                </div>

                <div class="form-group">
                    <label for="summary">Summary</label>
                    <textarea placeholder="Please write a short description of the recipe." class="form-control" id="summary" name="summary" rows="3">{{ (old('summary') == null) ? $recipe->summary : old('summary') }}</textarea>
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
                            <input class="form-control" id="servings" type="text" name="servings" value ="{{ (old('servings') == null) ? $recipe->servings : old('servings') }}" placeholder="Number of servings">
                            <br>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="overall_time">Total Time</label>
                            <input placeholder="Number of minutes" id="overall_time" class="form-control" type="text" name="overall_time"value ="{{ (old('overall_time') == null) ? $recipe->overall_time : old('overall_time') }}">
                            <br>
                        </div>
                    </div>
                </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="image_url">Image Link</label>
                        <input type="text" id="image_url" name="image_url" value="{{ (old('image_url') == null) ? $recipe->image_url : old('image_url') }}" placeholder="Link to image" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="video_url">Video Link</label>
                        <input type="text" id="video_url" name="video_url" value="{{ (old('video_url') == null) ? $recipe->video_url : old('video_url') }}" placeholder="Link to Video" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="notes">Additional notes</label>
                <br>
                <textarea class="form-control" id="notes" placeholder="Please enter any additional information." name="notes" rows="3" >{{ (old('notes') == null) ? $recipe->notes : old('notes') }}</textarea>
                <br>
            </div>
            
            {{-- Buttons --}}
            <div class="modal-footer">
                {{-- <div class="col-sm-8">
                    
                </div>   --}}          
                <div class="col-md-2 col-md-offset-8">
                    <button type="button" class="btn btn-default customButtonStyle pull-right customBtnMargin" data-dismiss="modal">Close</button>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-success customButtonStyle" id="ingredient-submit">Save Changes</button>
                </div>
            </form>
        </div>
    </div> <!-- .modal-footer -->

</div>


@include ('errors.list')