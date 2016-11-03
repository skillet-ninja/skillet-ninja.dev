@extends('layouts.partials._step')

@section ('form-start')
<form class="form" action="{{ action('StepController@update') }}" method="POST">
            {!! csrf_field() !!}
            {!! method_field('PATCH') !!}

            <input type="hidden" id="stepId" name="stepId" value="{{ $step->id }}">
            {{-- <input type="hidden" id="recipeId" name="recipeId" value="{{ $recipe->id }}"> --}}
@stop

@section ('step-input')

    <textarea placeholder="Please write a descriptive cooking step." class="form-control" id="step" name="step" rows="2">{{ (old('step') == null) ? $step->step : old('step') }}</textarea>
@stop

@section ('timer-input')

    <input class="form-control" id="time" type="text" name="time" placeholder="Time (min)" 
    value="{{ (old('time') == null) ? $step->time : old('time') }}">
@stop

@section ('image-input')

    <input class="form-control" id="image_url" type="text" name="image_url" placeholder="Time (min)"
            value="{{ (old('image_url') == null) ? $step->image_url : old('image_url') }}">
@stop


@section ('video-input')
                
    <input class="form-control" id="video_url" type="text" name="video_url" placeholder="Time (min)"
            value="{{ (old('video_url') == null) ? $step->video_url : old('video_url') }}">
@stop

@section ('delete-button')

    <form class="form" action="/steps/{{ $step->id }}" method="POST">
        {!! csrf_field() !!}
        {!! method_field('DELETE') !!}
        <input type="hidden" id="recipeId" name="recipeId" value="{{ $recipe->id }}">
        <button class="btn btn-danger customButtonStyle">Delete</button>
    </form>

@stop
