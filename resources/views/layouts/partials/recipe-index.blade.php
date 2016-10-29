{{-- <div class="row"> --}}
    <div class="dropdown text-right">
        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Sort By
        <span class="caret"></span></button>
        <ul class="dropdown-menu pull-right">
            <li><a href="#">Top Rated</a></li>
            <li><a href="#">Most Recent</a></li>
            <li><a href="#">Difficulty</a></li>
        </ul>
    </div>
    <br>
{{-- </div> --}}


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
            <div class="thumbnail thumbnailStyle">
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

<div class="row">
    <div class="col-xs-6 col-xs-offset-3 text-center">
        {!! $recipes->appends(['searchTerm' => $searchTerm])->render() !!}
    </div>
</div>