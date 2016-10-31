<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        
        <h2>Edit</h2>


<form class="form" action="{{ action('StepController@update') }}" method="POST">
            {!! csrf_field() !!}
            {!! method_field('PUT') !!}

    <div class="row">

        {{-- Step Input --}}
        <div class="col-sm-10">
            <div class="form-group">
                <label for="step">Step</label>
                <textarea placeholder="Please write a descriptive cooking step." class="form-control" id="step" name="step" rows="2">{{ (old('step') == null) ? $step->step : old('step') }}</textarea>
            </div>
        </div>

        {{-- Timer Input --}}
        <div class="col-sm-2">
            <div class="form-group">
                <label for="time">Timer</label>
                <input class="form-control" id="time" type="text" name="time" placeholder="Time (min)"
                value="{{ (old('time') == null) ? $step->time : old('time') }}">
            </div>
        </div>

    </div> <!-- .row -->

    <div class="row">

        {{-- Imgage URL Input --}}
        <div class="col-sm-6">
            <div class="form-group">
                <label for="image_url">Image Link</label>
                <input class="form-control" id="image_url" type="text" name="image_url" placeholder="Time (min)"
                value="{{ (old('image_url') == null) ? $step->image_url : old('image_url') }}">
            </div>
        </div>

        {{-- Video URL Input --}}
        <div class="col-sm-6">
            <div class="form-group">
                <label for="video_url">Video Link</label>
                <input class="form-control" id="video_url" type="text" name="video_url" placeholder="Time (min)"
                value="{{ (old('video_url') == null) ? $step->video_url : old('video_url') }}">
            </div>
        </div>

    </div> <!-- .row -->

    <div class="row">
        <input type="hidden" id="stepId" name="stepId" value="{{ $step->id }}">
        <input type="hidden" id="recipeId" name="recipeId" value="{{ $recipe->id }}">
        <button class="btn btn-success" id="ingredient-submit">Save Changes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <p></p>
    </div> <!-- .row -->

</form>  <!-- form  -->
    </div> <!-- .col-sm-8 -->
</div> <!-- .row -->