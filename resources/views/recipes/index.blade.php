@extends ('layouts.master')

@section('top-scripts')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@stop

@section ('title', 'Recipes')

@section ('content')

<div class="row">

    @foreach ($recipes as $recipe)
        <div class="col-sm-6 col-md-4 recipe">
            <div class="thumbnail">
                {{-- <img src="https://placehold.it/350x300" class="img-responsive image1"> --}}
                <img src="{!! $recipe->image_url !!}" class="img-responsive image1">
                <div class="caption recipe-thumbnail">
                    <h3>{{ $recipe->name }}</h3>
                    <p class="line-clamp">{{ $recipe->summary }}</p>
                                       
                    @include('layouts.partials.recipe-modalB')
                    
                    <button type="button" class="btn btn-primary pull-right" data-toggle="modal" 
                    data-target="#myModal">SKILLET!</button>
                    {{-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" 
                    data-target="{{ action('VcaController@cook', $recipe->id) }}">Start Cooking</button> --}}
                </div> <!-- caption -->
            </div> <!-- thumbnail -->
        </div> <!-- recipe -->
    @endforeach

</div>  <!-- row -->

{!! $recipes->render() !!}

@stop

@section('bottom-scripts')

    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script type="text/javascript">
        
        $('.rating input').change(function () {
          var $radio = $(this);
            $('.rating .selected').removeClass('selected');
            $radio.closest('label').addClass('selected');
        });

        $('.btn-view-recipe').on('click', function(e){
           $recipeId = e.target.getAttribute("data-recipe");
            $('#myModal').modal('show');
        });

    </script>

@stop
 