@extends ('layouts.master')

@section('top-scripts')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@stop

@section ('title', 'Recipes')

@section ('content')

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
                   
                    @include('layouts.partials.recipe-modal')
                    {{-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" 
                    data-target="{{ action('RecipesController@show', $recipe->id) }}">View Recipe</button> --}}
                    <button type="button" class="btn btn-primary pull-right" data-toggle="modal" 
                    data-target="#myModal">SKILLET!</button>
                    {{-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" 
                    data-target="{{ action('VcaController@cook', $recipe->id) }}">Start Cooking</button> --}}
                </div> <!-- caption -->
            </div> <!-- thumbnail -->
        </div> <!-- recipe -->
    {{-- @endforeach --}}

</div>  <!-- row -->

{{-- {!! $recipes->appends(['searchTerm' => $searchTerm])->render() !!} --}}

@stop

@section('bottom-scripts')

    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script type="text/javascript">
        
        $('.rating input').change(function () {
          var $radio = $(this);
            $('.rating .selected').removeClass('selected');
            $radio.closest('label').addClass('selected');
        });

    </script>

@stop
 