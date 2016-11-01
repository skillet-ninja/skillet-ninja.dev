<div class="col-sm-6 col-md-4 recipe">
    <div class="thumbnail thumbnailStyle">
        <img src="{!! $recipe->image_url !!}" class="img-responsive image1">
        <div class="caption recipe-thumbnail">
            <div class="row">
                <div class="col-xs-10 customParagraphPadding">
                    <h3 class="recipeHeader">{{ $recipe->name }}</h3>
                    <p class="line-clamp">{{ $recipe->summary }}</p>
                </div>
                <div class="col-xs-2 customVotePadding text-center">
                    {{-- Voting --}}
                    @if(Auth::check())
                        <div class="votingInterface">
                            <form class="form" method="POST" name="upvote" action="{{ action('RecipesController@addVote') }}">
                            {{-- Votes Score --}}
                                <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                {!! csrf_field() !!}
                                <button id="voteUpButton" type="submit" class="voter"><i class="fa fa-angle-up" aria-hidden="true"></i></button>
                            </form>
                            <span id="voteScore" class="line-clamp">{{ $recipe->vote_score }}</span>
                            <form class="form" method="POST" name="downvote" action="{{ action('RecipesController@downVote') }}">
                                <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                {!! csrf_field() !!}
                                <button id="voteDownButton" type="submit" class="voter"><i class="fa fa-angle-down" aria-hidden="true"></i></button>
                            </form>   
                        </div>
                    @endif
                    
                </div>
            </div>
            

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
                    @endif
                </div>
                <div class="col-xs-4">
                    
                    @if(Auth::check())
                        <a href="{{ action('RecipesController@show', $recipe->id) }}" class="recipeBtn btn btn-primary btn-success pull-right">START!</a>
                    @else
                        <a href="/auth/login" class="recipeBtn btn btn-primary btn-success pull-right stopSkilletButton">START!</a>
                    @endif
                        
                </div>  
            </div>
        </div> <!-- caption -->
    </div> <!-- thumbnail -->
</div> <!-- recipe -->


