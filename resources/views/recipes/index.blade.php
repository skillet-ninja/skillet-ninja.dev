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
                    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-primary btn-view-recipe" data-recipe={{ $recipe->id }}>View Recipe</button>
                                       
                    @include('layouts.partials.recipe-modalB')

                    <a href="{{ action('RecipesController@show', $recipe->id) }}" class="btn btn-primary pull-right">SKILLET!</a>

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
           var recipeId = e.target.getAttribute("data-recipe");
           console.log(recipeId);
        
            $.get("/recipes/" + recipeId , function(){
            });
        $('#myModal').modal('show');
        });

    </script>

@stop
 