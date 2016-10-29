@extends ('layouts.master')

@section ('title', 'Recipe Editor')

@section ('content')
    <h1 class="h1 text-center">Recipe Editor</h1>
    <hr/>

    <div class="row">
        <div class="col-md-4">

<button type="button" class="btn btn-primary btn-primary btn-view-recipe" data-recipe={{ $recipe->id }}>View Recipe</button>
<a href="{{ action('RecipesController@edit', $recipe->id) }}" class="btn btn-primary btn-success pull-right">SKILLET!</a>

            <img src="{{$recipe->image_url}}" class="thumbnail" alt="recipe image">
        </div>
        <div class="col-md-4">
            <span class="pull-right"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></span>
            <h1>{{ $recipe->name }}</h1>
            <p><em>{{ $recipe->summary }}</em></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <p><span class="recipe-data"><strong>SERVINGS</strong> {{ $recipe->servings }}</span>
               <span class="recipe-data"><strong>Total Time</strong> {{ $recipe->overall_time }}</span></p>
            <p><span class="recipe-data"><strong>Tags</strong>
                @foreach ($recipe->tags as $tag)
                    {{ $tag->tag }}
                @endforeach
            </p>
            {{-- <p>{{ $recipe->video_url }}</p> --}}

        </div>

    </div>


   


@section('bottom-scripts')

    <script type="text/javascript">

        $('.btn-edit-recipe').on('click', function(e){
            var recipeId = e.target.getAttribute("data-recipe");
            $.get("/recipes/" + recipeId + "?edit_recipe=true", function(data){
            $(".recipe-modal").html(data);
            });
            $('#myModal').modal('show');
        });
        $('.btn-edit-ingredient').on('click', function(e){
            var recipeId = e.target.getAttribute("data-recipe");
            $.get("/recipes/" + recipeId + "?edit_ingredient=true", function(data){
            $(".recipe-modal").html(data);
            });
            $('#myModal').modal('show');
        });
        $('.btn-edit-step').on('click', function(e){
            var recipeId = e.target.getAttribute("data-recipe");
            $.get("/recipes/" + recipeId + "?edit_step=true", function(data){
            $(".recipe-modal").html(data);
            });
            $('#myModal').modal('show');
        });

    </script>

@stop