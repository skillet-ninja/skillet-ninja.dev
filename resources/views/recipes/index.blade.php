@extends ('layouts.master')

@section('top-scripts')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@stop

@section ('title', 'Recipes')

@section ('content')

<!-- Recipe Modal -->
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Recipe</h4>
            </div>
            <div class="recipe-modal"></div>
        </div>
    </div>
</div>  <!-- End.Recipe Modal -->


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
                    <a href="{{ action('RecipesController@show', $recipe->id) }}" class="btn btn-primary btn-success pull-right">SKILLET!</a>
                </div> <!-- caption -->
            </div> <!-- thumbnail -->
        </div> <!-- recipe -->
    @endforeach

</div>  <!-- row -->

{!! $recipes->appends(['searchTerm' => $searchTerm, 'searchParameter'=>$searchParameter])->render() !!}

@stop

@section('bottom-scripts')

    <script type="text/javascript">
        
        $('.rating input').change(function () {
          var $radio = $(this);
            $('.rating .selected').removeClass('selected');
            $radio.closest('label').addClass('selected');
        });

        $('.btn-view-recipe').on('click', function(e){
            var recipeId = e.target.getAttribute("data-recipe");
            $.get("/recipes/" + recipeId + "?continue=false", function(data){
            $(".recipe-modal").html(data);
            });
            $('#myModal').modal('show');
        });

    </script>

@stop
 