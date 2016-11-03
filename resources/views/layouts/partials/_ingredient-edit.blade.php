@extends('layouts.partials._ingredient')

@section ('form-start')
        <form class="form" action="{{ action('IngredientController@update') }}" method="POST" id="ingredientUpdate" name="ingredientUpdate">

            {!! csrf_field() !!}
            {!! method_field('PUT') !!}

            <input type="hidden" id="ingredientId" name="ingredientId" value="{{ $ingredient->id }}">
            <input type="hidden" id="recipeId" name="recipeId" value="{{ $recipe->id }}">
@stop


@section ('amount-input')

    <input class="form-control" id="amount" type="text" name="amount" placeholder="Amount"
            value="{{ (old('amount') == null) ? $ingredient->pivot->amount : old('amount') }}">
@stop


@section ('ingredient-input')

    <input class="form-control" id="ingredient" type="text" name="ingredient" placeholder="Ingredient Name"
            value="{{ (old('ingredient') == null) ? $ingredient->ingredient : old('ingredient') }}">
@stop



@section ('delete-button')

    <form class="form" action="/ingredients/{{ $ingredient->id }}" method="POST">
        {!! csrf_field() !!}
        {!! method_field('DELETE') !!}
        <input type="hidden" id="recipeId" name="recipeId" value="{{ $recipe->id }}">
        <button class="btn btn-danger customButtonStyle">Delete</button>
    </form>
@stop