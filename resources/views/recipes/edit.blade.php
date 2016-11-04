@extends ('layouts.master')

@section ('title', 'Skillet Ninja - Edit')

@section ('modal-title', 'Recipe Input')

@section ('content')

@include('layouts.partials._initialization')


<h1 class="text-center">Recipe Edit</h1>
<hr/>


{{-- Recipe Edit Section --}}


{{-- Basic Recipe Display --}}
<div class ="row">

    {{-- Recipe Image --}}
    <div class="col-xs-12 col-md-5">
        <h3 class="topMarginHeader">{{ $recipe->name }}</h3>
        <div style="background-image: url('{{ $recipe->image_url }}'); background-size:cover; background-position:center; overflow:hidden; background-repeat:no-repeat" class="pictureContainer img-responsive image1 text-center center-block pull-left">
        </div>
    </div> <!-- .col-md-4 -->


    {{-- Description and Time --}}
    <div class="col-xs-12 col-md-5">
        <h3 class="topMarginHeader">Description</h3>
        <p><em>{{ $recipe->summary }}</em></p>
        <p class="recipe-data"><strong>Servings </strong> {{ $recipe->servings }}</p>
        <p class="recipe-data"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $recipe->overall_time }} minutes</p>
            
        {{-- Tag Input --}}
        <h3>Tags</h3>
        @foreach ($recipe->tags as $tag)

            <a href="#" class="btn btn-default customTagStyle text-left remove-item" 
            data-tagId={{ $tag->id }} data-recipeId={{ $recipe->id }}>{{ $tag->tag }}  <i class="fa fa-times" aria-hidden="true"></i></a>

        @endforeach

        <form class="form form-group" action="{{ action('TagController@store') }}" method="POST">
            {!! csrf_field() !!}
            <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
            <br>
            
            <div class="form-group">
                
                <input id="tags" class="form-control" data-role="tagsinput" placeholder="Separate with commas" name="tags">

                <button type="submit" class="btn btn-primary customButtonStyle" type="button"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i></button>

            </div>
        </form>
    </div>

    <div class="col-xs-12 col-md-2">
        <button type="button" class="btn btn-sm btn-modal edit-recipe pull-right customButtonStyle marginDown"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></button><br>
    </div>

</div>


<hr/>

<div class="row">
    <div class="col-md-5">
        <h3>Edit Ingredients</h3>
            <div class="list-group">
                @foreach ($recipe->ingredients as $ingredient)
                  <button type="button" class="list-group-item edit-ingredient" data-recipe={{ $recipe->id }} data-ingredient={{ $ingredient->id }}>
                    {{$ingredient->pivot->amount}}  {{ $ingredient->ingredient }}
                    <span class="badge"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                  </button>
                @endforeach
                <button type="button" class="list-group-item add-ingredient customButtonStyle"><strong>Add An Ingredient</strong>
                    <span class="badge"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                  </button>
            </div> <!-- .list-group  -->

    </div> <!-- .col-md-5 -->





    <div class="col-md-7">
        <h3>Edit Steps</h3>

        <div class="list-group">
            @foreach ($recipe->steps as $step)
                <button type="button" class="list-group-item edit-step" data-recipe={{ $recipe->id }} data-step={{ $step->id }}>
                    <span class="badge"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                    <h4 class="list-group-item-heading">{{$step->step}}</h4>
                    Timer: {{ $step->time}} min <br>
                    Image Link: {{ $step->image_url }}<br>
                    Video Link: {{ $step->video_url }}
                </button>
            @endforeach
            <button type="button" class="list-group-item add-step customButtonStyle"><strong>Add A Step</strong>
                <span class="badge"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
            </button>

        </div><!-- .list-group  -->



    </div> <!-- .col-md-5 -->

</div> <!-- .row  -->
<div class="row">
    <div class="col-sm-6 pull-left">
        <form class="form" action="/recipes/{{ $recipe->id }}" method="POST">
            {!! csrf_field() !!}
            {!! method_field('DELETE') !!}
            <button class="btn btn-danger btn-lg customButtonStyle">Delete Recipe</button>
        </form>
    </div>
    <div class="col-sm-6">
        <a href="/users/{{ Auth::id() }}" class="btn btn-default btn-lg customButtonStyle pull-right">Done</a>
    </div>
</div>
<br>
<br>




@stop


@section('bottom-scripts')
    
    
    <script>

        $(".remove-item").on('click',function(e){
            e.preventDefault();
            var id = $(e.target).data('tagid');
                $.ajax({
                    url: '/tags/' + id +'?recipeId={{ $recipe->id }}',
                    data: { "_token": "{{ csrf_token() }}" },
                    type: 'DELETE',
                });
            $(e.target).fadeOut('fast');
        });


    </script>


    <script type="text/javascript">

        $('.edit-recipe').on('click', function(e){
            var currentURL = $(location).attr("href");
            var hasHash = currentURL.indexOf("#") + 1;
            var pageURL = hasHash ? currentURL.replace('#', "?recipe=true") : currentURL + "?recipe=true";
            $.get(pageURL, function(data){
                $(".recipe-modal").html(data);
            });
            $('#myModal').modal('show');
        });

        $('.edit-ingredient').on('click', function(e){
            var recipeId = e.target.getAttribute("data-recipe");
            var ingredientId = e.target.getAttribute("data-ingredient");
            $.get("/recipes/" + recipeId + "/edit?ingredient=true&ingredientId=" + ingredientId, function(data){
            $(".recipe-modal").html(data);
            });
            $('#myModal').modal('show');
        });

        $('.add-ingredient').on('click', function(e){
            var currentURL = $(location).attr("href");
            var hasHash = currentURL.indexOf("#") + 1;
            var pageURL = hasHash ? currentURL.replace('#', "?addIngredient=true") : currentURL + "?addIngredient=true";
            $.get(pageURL, function(data){
                $(".recipe-modal").html(data);
            });
            $('#myModal').modal('show');
        });

        $('.edit-step').on('click', function(e){
            var recipeId = e.target.getAttribute("data-recipe");
            var stepId = e.target.getAttribute("data-step");
            $.get("/recipes/" + recipeId + "/edit?step=true&stepId=" + stepId, function(data){
            $(".recipe-modal").html(data);
            });
            $('#myModal').modal('show');
        });

         $('.add-step').on('click', function(e){
            var currentURL = $(location).attr("href");
            var hasHash = currentURL.indexOf("#") + 1;
            var pageURL = hasHash ? currentURL.replace('#', "?addStep=true") : currentURL + "?addStep=true";
            $.get(pageURL, function(data){
                $(".recipe-modal").html(data);
            });
            $('#myModal').modal('show');
        });



    </script>

@stop