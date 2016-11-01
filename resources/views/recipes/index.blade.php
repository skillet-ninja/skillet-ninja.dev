@extends ('layouts.master')

@section('top-scripts')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@stop

@section ('title', 'Recipes')

@section ('content')

<h1 class="text-center">Recipes</h1>

{{-- <div class="row"> --}}
    <div class="dropdown text-right">
        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Sort By
        <span class="caret"></span></button>
        <ul class="dropdown-menu pull-right">
            <li><a href="{{ URL::route('sortRecipes') }}?sort=top_rated&searchTerm={{ $searchTerm }}">Top Rated</a></li>
            <li><a href="{{ URL::route('sortRecipes') }}?sort=most_recent&searchTerm={{ $searchTerm }}">Most Recent</a></li>
            <li><a href="{{ URL::route('sortRecipes') }}?sort=difficulty&searchTerm={{ $searchTerm }}">Difficulty</a></li>
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

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">


            @foreach ($tagsDiv as $tag)
                    <a class="btn btn-default" href="{{ URL::route('sortRecipes') }}?search_tag={{ $tag }}" target="_blank">#{{ $tag }}</a>
            @endforeach
        </div>
    </div>
</div>


<div class="row">



    @foreach ($recipes as $recipe)
        @include('layouts.partials.recipe-index')
    @endforeach

</div>  <!-- row -->

<div class="row">
    <div class="col-xs-6 col-xs-offset-3 text-center">
        {!! $recipes->appends(['searchTerm' => $searchTerm])->render() !!}
    </div>
</div>

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
 