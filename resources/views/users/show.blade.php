@extends ('layouts.master')

@section ('title', 'Skillet User')

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


<div class="container">
    <div class="row">
        <div class="col-md-8">
                <h1>{{ $user->name }}</h1>
                <h3>{{ $user->email }}</h3><br>
        </div>
        <div class="col-md-4">
            <i class="fa fa-user fa-5x pull-right" aria-hidden="true"></i>
            <a href="{{ action('UsersController@edit', $user->id) }}" class="btn btn-primary btn-success btn-edit-account pull-right"><i class="fa fa-pencil-square-o pull-right" aria-hidden="true"></i>  Edit Profile</a>
        </div><br>
    </div>
<div class="row">
    <div class="col-md-4">
        <h3>My Recipes:</h3>
    </div>
</div>  <!-- row -->

<div class="row">
    @if (empty($user->recipes->items))
        <h1>Add some recipes to get started</h1>
    @endif

    @foreach ($user->recipes as $recipe)
        <div class="col-sm-6 col-md-4 recipe">
            <div class="thumbnail">
                <img src="{!! $recipe->image_url !!}" class="img-responsive image1">
                <div class="caption recipe-thumbnail">
                    <h3>{{ $recipe->name }}</h3>
                    <p class="line-clamp">{{ $recipe->summary }}</p>
                    
                    <!-- Button trigger modal -->
                    
                    <button type="button" class="btn btn-primary btn-primary btn-view-recipe" data-recipe={{ $recipe->id }}>View Recipe</button>
                    <a href="{{ action('RecipesController@update', $recipe->id) }}" class="btn btn-primary">Edit Recipe
                    </a>
                    <a href="{{ action('RecipesController@show', $recipe->id) }}" class="btn btn-primary btn-success pull-right">SKILLET!
                    </a>
                </div> <!-- caption -->
            </div> <!-- thumbnail -->
        </div> <!-- recipe -->
    @endforeach
</div>  <!-- row -->
</div>

@stop

@section('bottom-scripts')
    <script type="text/javascript">

        $('.btn-view-recipe').on('click', function(e){
            var recipeId = e.target.getAttribute("data-recipe");
            $.get("/recipes/" + recipeId + "?continue=false", function(data){
            $(".recipe-modal").html(data);
            });
            $('#myModal').modal('show');
        });

    </script>

@stop