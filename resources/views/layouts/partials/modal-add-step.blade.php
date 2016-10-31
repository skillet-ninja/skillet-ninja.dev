<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        
        <h2>Add a step to {{ $recipe->name }} {{ $recipe->id }}</h2>


<form class="form" action="{{ action('StepController@store') }}" method="POST">
            {!! csrf_field() !!}

    <div class="row">

        {{-- Step Input --}}
        <div class="col-sm-10">
            <div class="form-group">
                <label for="step">Step</label>
                <textarea placeholder="Please write a descriptive cooking step." class="form-control" id="step" name="step" rows="2">{{ old('step') }}</textarea>
            </div>
        </div>

        {{-- Timer Input --}}
        <div class="col-sm-2">
            <div class="form-group">
                <label for="time">Timer</label>
                <input class="form-control" id="time" type="text" name="time" placeholder="Time (min)"
                value="{{ old('time') }}">
            </div>
        </div>

    </div> <!-- .row -->

    <div class="row">

        {{-- Imgage URL Input --}}
        <div class="col-sm-6">
            <div class="form-group">
                <label for="image_url">Image Link</label>
                <input class="form-control" id="image_url" type="text" name="image_url" placeholder="Image Link"
                value="{{ old('image_url') }}">
            </div>
        </div>

        {{-- Video URL Input --}}
        <div class="col-sm-6">
            <div class="form-group">
                <label for="video_url">Video Link</label>
                <input class="form-control" id="video_url" type="text" name="video_url" placeholder="Video Link"
                value="{{ old('video_url') }}">
            </div>
        </div>

        {{-- Recipe Id Hidden input --}}
        <input type="hidden" id="recipeId" name="recipeId" value="{{ $recipe->id }}">

    </div> <!-- .row -->

    <div class="row">
        <button class="btn btn-success" id="ingredient-submit">Save Changes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <p></p>
    </div> <!-- .row -->

</form>  <!-- form  -->
    </div> <!-- .col-sm-8 -->
</div> <!-- .row -->