@extends('layouts.partials._ingredient')

@section ('form-start')

    <form class="form" action="{{ action('IngredientController@store') }}" method="POST">
    	
        {!! csrf_field() !!}
        <input type="hidden" id="recipeId" name="recipeId" value="{{ $recipe->id }}">
@stop

@section ('amount-input')

    <input class="form-control" id="amount" type="text" name="amount" placeholder="Amount"
            value="{{ old('amount') }}">
@stop


@section ('ingredient-input')

    <input class="form-control" id="ingredient" type="text" name="ingredient" placeholder="Ingredient Name"
            value="{{ old('ingredient') }}">
@stop