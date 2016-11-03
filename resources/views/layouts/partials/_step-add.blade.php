@extends('layouts.partials._step')

@section ('form-start')

<form class="form" action="{{ action('StepController@store') }}" method="POST">
            {!! csrf_field() !!}
        
        {{-- Recipe Id Hidden input --}}
        <input type="hidden" id="recipeId" name="recipeId" value="{{ $recipe->id }}">
@stop

@section ('step-input')

    <textarea placeholder="Please write a descriptive cooking step." class="form-control" id="step" name="step" rows="2">{{ old('step') }}</textarea>
@stop

@section ('timer-input')

    <input class="form-control" id="time" type="text" name="time" placeholder="Time (min)" value="{{ old('time') }}">
@stop

@section ('image-input')

    <input class="form-control" id="image_url" type="text" name="image_url" placeholder="Image Link"
            value="{{ old('image_url') }}">
@stop

@section ('video-input')

    <input class="form-control" id="video_url" type="text" name="video_url" placeholder="Video Link"
            value="{{ old('video_url') }}">
@stop