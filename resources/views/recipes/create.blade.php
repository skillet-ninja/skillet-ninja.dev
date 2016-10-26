@extends ('layouts.master')

@section ('content')
    <h1 class="h1 text-center">Recipe Creator</h1>

    @include('layouts.partials.recipe-entry')


    @include('layouts.partials.ingredient-entry')

    @include('layouts.partials.step-entry')


@stop

@section('bottom-scripts')

    <script src="/assets/js/create.js"></script>

@stop