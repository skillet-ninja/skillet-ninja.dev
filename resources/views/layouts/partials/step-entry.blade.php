
@if(isset($recipe_id))

@if(isset($stepsDisplayed))
    @foreach($stepsDisplayed as $step)


        <p>{{ $step->step }}<p>
        <p>{{ $step->time }}</p>

    @endforeach
@endif
    <form class="form" action="{{ action('StepController@store')}}" method="POST" id="stepCreate" name="stepCreate">
    {!! csrf_field() !!}
        <input type="hidden" name="recipe_id" value="{{ $recipe_id }}">
        {{-- New Step Partial --}}
        <h3>Steps</h3>
        <label for="step">Please enter a specific instruction, e.g. "Stir occasionally until golden brown."</label>
        <br>
        <input id="recipe-name" type="text" name="step">
        <br>

        <label for="step" >Timer (if needed)</label>
        <input id="recipe-name" type="text" name="time">

        <label for="step" >Video URL (if needed)</label>
        <input id="recipe-name" type="text" name="video_url">
        
        <label for="step" >Image URL (if needed)</label>
        <input id="recipe-name" type="text" name="image_url">

        <button class="btn btn-primary">Add Step</button>

    </form>

    @if(isset($tagsDisplayed))
        @foreach($tagsDisplayed as $tag)


            <p>{{ $tag->tag }}<p>

        @endforeach
    @endif

    <form class="form" action="{{ action('TagController@store')}}" method="POST" id="tagCreate" name="tagCreate">
    {!! csrf_field() !!}
        <input type="hidden" name="recipe_id" value="{{ $recipe_id }}">
        <br>
        <label>Keywords</label>
        <br>
        <textarea placeholder="Please enter any relevant keywords seperated by commas, e.g. 'vegan, savory, etc.' " name="tag"></textarea>
        <br>
        <button class="btn btn-primary">Add Tag</button>
        <br>
    </form> 

    <a href="/home" class="btn btn-primary">Done</a>

@endif