
@if(isset($recipe_id))

    @if(isset($stepsDisplayed))
        @foreach($stepsDisplayed as $step)
            <p>{{ $step->step }}<p>
            <p>{{ $step->time }}</p>\
        @endforeach
    @endif

    <form class="form form-group" action="{{ action('StepController@store')}}" method="POST" id="stepCreate" name="stepCreate">
    {!! csrf_field() !!}
        <input type="hidden" name="recipe_id" value="{{ $recipe_id }}">
        {{-- New Step Partial --}}
        <h3>Steps</h3>
        <label for="step">Please enter a specific instruction, e.g. "Stir occasionally until golden brown."</label>
        <input class="form-control" id="recipe-name" type="text" name="step">

        <label for="step" >Timer (if needed)</label>
        <input class="form-control" id="recipe-name" type="text" name="time">

        <label for="step" >Video URL (if needed)</label>
        <input class="form-control" id="recipe-name" type="text" name="video_url">
        
        <label for="step" >Image URL (if needed)</label>
        <input class="form-control" id="recipe-name" type="text" name="image_url">

        <br>
        <button class="btn btn-primary">Add Step</button>

    </form>

    @if(isset($recipe_id))
        <button id="toKeywordEntry" class="btn btn-primary center-block">Next</button>
    @endif
    

@endif