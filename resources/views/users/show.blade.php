@extends ('layouts.master')

@section ('title', 'Skillet User')

@section ('content')
<div class="page-header">
	<h1><i class="fa fa-user fa-2x" aria-hidden="true"></i>  {{ $user->username }}</h1>
</div>
<div class="row">
    {{-- @foreach ($recipes as $recipe) --}}
        <div class="col-sm-6 col-md-4 recipe">
            <div class="thumbnail">
                <img src="http://placehold.it/350x300" class="img-responsive image1">
                {{-- <img src={!! $recipe->image !!} class="img-responsive image1"> --}}
                <div class="caption recipe-thumbnail">
                    {{-- <h3>{{ $recipe->name }}</h3> --}}
                    {{-- <p class="line-clamp">{{ $recipe->description }}</p> --}}
                    <h3>Thumbnail label</h3>
                    <p class="line-clamp">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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
    {{-- @endforeach --}}

</div>  <!-- row -->

		

@stop


<div class="row">