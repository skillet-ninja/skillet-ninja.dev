<div class="col-sm-6 col-md-6 col-lg-4 recipe">
    <div class="thumbnail thumbnailStyle">
        <div style="background-image: url('{!! $recipe->image_url !!}'); background-size:cover; background-position:center; overflow:hidden; background-repeat:no-repeat" class="pictureContainer img-responsive image1 text-center center-block">
        </div>
        <div class="caption recipe-thumbnail">
            <div class="row">
                <div class="col-xs-10 customParagraphPadding">
                    <h3 class="recipeHeader line-clamp1">{{ $recipe->name }}</h3>
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
                    <button type="button" class="recipeBtn btn btn-primary btn-primary btn-view-recipe customButtonStyle" data-recipe={{ $recipe->id }}>View</button>
                </div>

                <div class="col-xs-4 text-center">
                    @if(Auth::check())
                        @if(Auth::id() == $recipe->user_id)
                            <a href="{{ action('RecipesController@edit', $recipe->id) }}" class="recipeBtn btn btn-primary customButtonStyle" id="editRecipeBtn">Edit</a>
                        @endif
                    @endif
                </div>
                <div class="col-xs-4">
                    
                    @if(Auth::check())
                        <a href="{{ action('RecipesController@show', $recipe->id) }}" class="recipeBtn btn btn-primary btn-success pull-right customButtonStyle">START!</a>
                    @else
                        <a href="/auth/login" class="recipeBtn btn btn-primary btn-success pull-right stopSkilletButton customButtonStyle">START!</a>
                    @endif
                        
                </div>  
            </div>
        </div> <!-- caption -->
    </div> <!-- thumbnail -->
</div> <!-- recipe -->

{{-- jQuery --}}
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

<script type="text/javascript">
        // Stops users that are not logged in from getting to the VCA
        // $(document.body).on('click', '.stopSkilletButton', function(event) {

        //     if (!Boolean({{Auth::check()}})) {
        //         var choice = confirm('Please login or register to access the virtual cooking assistant.');
        //         if (choice != true) {

        //             event.preventDefault();
                    
        //         }
        //     }
        // });


</script>


