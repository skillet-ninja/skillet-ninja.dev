@extends ('layouts.master')

@section('top-scripts')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@stop

@section ('title', 'Skillet Ninja Recipes')

@section ('modal-title', 'Check out...')

@section ('content')

<!-- Recipe Modal -->
@include('layouts.partials._initialization')

<h1 class="text-center">COMMUNITY RECIPES</h1>
<hr>

{{-- Sort By Selector --}}
    <div class="dropdown text-right">
        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Sort By
        <span class="caret"></span></button>
        <ul class="dropdown-menu pull-right">
            <li><a href="{{ URL::route('sortRecipes') }}?sort=top_rated&searchTerm={{ $searchTerm }}&search_tag={{ $search_tag }}">Top Rated</a></li>
            <li><a href="{{ URL::route('sortRecipes') }}?sort=most_recent&searchTerm={{ $searchTerm }}&search_tag={{ $search_tag }}">Most Recent</a></li>
            <li><a href="{{ URL::route('sortRecipes') }}?sort=difficulty&searchTerm={{ $searchTerm }}&search_tag={{ $search_tag }}">Difficulty</a></li>
        </ul>
    </div>
    <br>


{{-- Recipe Cards --}}

<div class="row">
    @foreach ($recipes as $recipe)
        @include('layouts.partials.recipe-index')
    @endforeach
</div>  <!-- row -->


{{-- Pagination --}}

<hr>

<div class="row">
    <div class="col-xs-8 col-xs-offset-2 text-center">
        {!! $recipes->appends(['searchTerm' => $searchTerm, 'search_tag' => $search_tag])->render() !!}
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
            $.get("/recipes/" + recipeId, function(data){
            $(".recipe-modal").html(data);
            });
            $('#myModal').modal('show');
        });

        // Stops users that are not logged in from getting to the VCA
        $('.stopSkilletButton').click(function(event) {
            if ({{Auth::check() + 1}} == 1) {
                var choice = confirm('Please login or register to access the virtual cooking assistant.');
                if (choice != true) {

                    event.preventDefault();
                    
                }
            }
        });

        // Stops users that are not logged in from getting to the VCA
        
        // $('.stopSkilletButton').click(function() {
        //     if ({{Auth::check() + 1}} == 1) {
        //         alert('Please login or register to access the virtual cooking assistant.');
        //     }
        // });

    </script>


@stop
 