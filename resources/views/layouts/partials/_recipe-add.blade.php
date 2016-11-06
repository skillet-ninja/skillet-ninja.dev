<div class="bs-callout bs-callout-warning hidden">
  <h4>Oh snap!</h4>
  <p>This form seems to be invalid :(</p>
</div>

<div class="bs-callout bs-callout-info hidden">
  <h4>Yay!</h4>
  <p>Everything seems to be ok :)</p>
</div>

<div class="row">
    <div class="col-xs-8 col-xs-offset-2">
        
        <h2>Start A New Recipe</h2>

        <form class="form" action="{{ action('RecipesController@store') }}" method="POST" id="recipeUpdate" name="recipeUpdate" data-parsley-validate="">  
            {!! csrf_field() !!}

            <input type="hidden" id="userId" name="user_id" value="{{ Auth::id() }}">
        
            <div class="form-group">
                <label for="recipeName">Recipe Name</label>
                <input class="form-control" id="name" type="text" name="name" value ="{{ old('name') }}" placeholder="Enter recipe name" required="">
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
                    <input class="form-control" id="servings" type="text" name="servings" value ="{{ old('servings') }}" placeholder="Number of servings" required="">
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
                    <input type="text" id="image_url" name="image_url" value="{{ old('image_url') }}" placeholder="Link to image" class="form-control">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="tutorial_url">Video Link</label>
                    <input type="text" id="tutorial_url" name="tutorial_url" value="{{ old('tutorial_url') }}" placeholder="Link to video" class="form-control">
                </div>
            </div>
        </div>

        {{-- Recipe Notes Input --}}
            <div class="form-group">
                <label for="notes">Additional notes</label>
                <br>
                <textarea class="form-control" id="notes" placeholder="Please enter any additional information." name="notes" rows="3" >{{ old('notes') }}</textarea>
                <br>
            </div>
        
            {{-- Buttons --}}
            <div class="modal-footer">

                    <button class="btn btn-success customButtonStyle" id="recipe-submit">Save</button>

                    <button type="button" class="btn btn-default customButtonStyle" data-dismiss="modal">Cancel</button>
                </div>
                <br>
            </div>
            
        </form> <!-- form  -->
    </div> <!-- .col-sm-8 .col-sm-offset-2 -->
</div> <!-- .row -->

<script type="text/javascript">
$(function () {
  $('#recipeUpdate').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
    $('.bs-callout-info').toggleClass('hidden', !ok);
    $('.bs-callout-warning').toggleClass('hidden', ok);
  })
  .on('form:submit', function() {
    return true; 
  });
});
</script>

@include ('errors.list')