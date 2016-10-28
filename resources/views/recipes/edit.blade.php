@extends ('layouts.master')

@section ('title', 'Recipe Creator')

@section ('content')
    <h1 class="h1 text-center">Recipe Editor</h1>

    {{-- @include('layouts.partials.recipe-entry') --}}

    {{-- @include('layouts.partials.ingredient-entry') --}}

    {{-- @include('layouts.partials.step-entry') --}}

    {!! Form::open() !!}

    {!! Form::close() !!}


@stop