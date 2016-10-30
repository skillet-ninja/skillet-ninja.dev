<div class="col-sm-6 col-md-4 recipe">
    <div class="thumbnail thumbnailStyle">
        {{-- <img src="https://placehold.it/350x300" class="img-responsive image1"> --}}
        <img src="{!! $recipe->image_url !!}" class="img-responsive image1">
        <div class="caption recipe-thumbnail">
            <h3 class="recipeHeader">{{ $recipe->name }}</h3>
            <p class="line-clamp">{{ $recipe->summary }}</p>
            <p class="line-clamp">{{ $recipe->vote_score }}</p>
            <!-- Button trigger modal -->
            <div class="row">
                <div class="col-xs-4">
                    <button type="button" class="recipeBtn btn btn-primary btn-primary btn-view-recipe" data-recipe={{ $recipe->id }}>View Recipe</button>
                </div>
                <div class="col-xs-4">

                @if(Auth::check())
                    @if(Auth::id() == $recipe->user_id)
                        <a href="{{ action('RecipesController@edit', $recipe->id) }}" class="recipeBtn btn btn-primary" id="editRecipeBtn">Edit Recipe</a>
                    @endif
                        <div class="col-sm-2">
                            <div class="row">
                                <form class="form" method="POST" name="upvote" action="{{ action('RecipesController@addVote') }}">
                                
                                    <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                                    {!! csrf_field() !!}
                                    <button type="submit"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
                                </form>
                                <form class="form" method="POST" name="downvote" action="{{ action('RecipesController@downVote') }}">
                                
                                    <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                                    {!! csrf_field() !!}
                                    <button type="submit"><i class="fa fa-thumbs-down" aria-hidden="true"></i></button>
                                </form>

                            </div>
                        </div>
                @endif
                </div>
                <div class="col-xs-4">
                    <a href="{{ action('RecipesController@show', $recipe->id) }}" class="recipeBtn btn btn-primary btn-success pull-right">SKILLET!</a>
                </div>  
            </div>
        </div> <!-- caption -->
    </div> <!-- thumbnail -->
</div> <!-- recipe -->