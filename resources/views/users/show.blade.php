@extends ('layouts.master')

@section ('title', 'Skillet User')

@section ('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <h1>{{ $user->name }}</h1>
            <h3>{{ $user->email }}</h3>
            <h3>My Recipes:</h3>
        </div>
    </div>
</div>
<div class="row">
    @foreach ($user->recipes as $recipe)
        <div class="col-sm-6 col-md-4 recipe">
            <div class="thumbnail">
                <img src="http://placehold.it/350x300" class="img-responsive image1">
                <img src="{!! $recipe->image !!}" class="img-responsive image1">
                <div class="caption recipe-thumbnail">
                    <h3>{{ $recipe->name }}</h3>
                    <p class="line-clamp">{{ $recipe->summary }}</p>
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" 
                    data-target="#myModal">View Recipe</button>
                    {{-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" 
                    data-target="{{ action('RecipesController@show', $recipe->id) }}">View Recipe</button> --}}
                    <button type="button" class="btn btn-primary btn-lg pull-right" data-toggle="modal" 
                    data-target="#myModal">Start Cooking</button>
                    {{-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" 
                    data-target="{{ action('VcaController@cook', $recipe->id) }}">Start Cooking</button> --}}
                </div> <!-- caption -->
            </div> <!-- thumbnail -->
        </div> <!-- recipe -->
    @endforeach

</div>  <!-- row -->

		

@stop


<div class="row">