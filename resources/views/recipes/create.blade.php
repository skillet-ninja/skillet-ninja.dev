@extends ('layouts.master')

@section ('title', 'Recipe Editor')


@section ('top-scripts')
  <link href="/assets/css/bootstrap-tagsinput.css" rel="stylesheet" type="text/css">
@stop

@section ('content')

@include('layouts.partials.modal-skeleton')


<h1 class="h1 text-center">Recipe Creator</h1>
<hr/>

{{-- Start Recipe Creation --}}
@if (!isset($recipe->id))
<div class="row">
	<div class="col-md-3 col-md-offset-5">
		<button type="button" class="btn btn-lg btn-modal add-recipe"><i class="fa fa-pencil fa-2x" aria-hidden="true">START</i></button>
	</div>
</div>
@endif


{{-- Add and Edit Current Recipe --}}

@if (isset($recipe->id))

	{{-- Recipe Edit --}}
	<div class="row">
			<button type="button" class="btn btn-sm btn-modal edit-recipe pull-right"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></button><br>

		<div class="col-md-4">
			<img src="{{ $recipe->image_url }}"><br>
			<p>Video URL to go here</p>
			<p>{{ $recipe->video_url }}</p>
		</div> <!-- .col-md-4 -->

		<div class="col-md-8">
			<h2>{{ $recipe->name }}</h2>
			<div class="row">
				<div class="col-sm-4">
					<p><em>{{ $recipe->summary }}</em></p>
					<p><span class="recipe-data"><strong>Servings </strong> {{ $recipe->servings }}</span>
					   <span class="recipe-data"><strong>Total Time </strong> {{ $recipe->overall_time }}</span></p>
					<p><span class="recipe-data"><strong>Tags</strong>
						@foreach ($recipe->tags as $tag)
							{{ $tag->tag }} 
						@endforeach
					</p>
				</div>
			</div> <!-- .row -->
		</div> <!-- .col-md-8 -->
	</div> <!-- .row -->
	<hr/>

	{{-- Ingredient Input and Edit --}}
	<div class="row">
		<div class="col-md-5">
			<h1>Ingredients <small>click to add/edit</small></h1>
				<div class="list-group">

					@foreach ($recipe->ingredients as $ingredient)
					  <button type="button" class="list-group-item edit-ingredient" data-recipe={{ $recipe->id }} data-ingredient={{ $ingredient->id }}>
						{{$ingredient->pivot->amount}}  {{ $ingredient->ingredient }}
						<span class="badge"><i class="fa fa-pencil" aria-hidden="true"></i></span>
					  </button>
					@endforeach

					<button type="button" class="list-group-item add-ingredient"><strong>Add An Ingredient</strong>
						<span class="badge"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
					  </button>
				</div> <!-- .list-group  -->

		</div> <!-- .col-md-5 -->

		{{-- Step Input or Edit --}}
		<div class="col-md-7">
			<h1>Steps <small>click to edit</small></h1>

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
				
				<button type="button" class="list-group-item add-step"><strong>Add A Step</strong>
					<span class="badge"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
				</button>

			</div><!-- .list-group  -->
		</div> <!-- .col-md-7 -->
	</div> <!-- .row  -->
@endif
@stop


@section('bottom-scripts')

	<script src="/assets/js/bootstrap-tagsinput.js"></script>

	<script type="text/javascript">


		$('.add-recipe').on('click', function(e){
			var currentURL = $(location).attr("href");
			var hasHash = currentURL.indexOf("#") + 1;
			var pageURL = hasHash ? currentURL.replace('#', "&recipe=true") : currentURL + "&recipe=true";
			$.get(pageURL, function(data){
				$(".recipe-modal").html(data);
			});
			$('#myModal').modal('show');
		});

		$('.edit-recipe').on('click', function(e){
			var currentURL = $(location).attr("href");
			var hasHash = currentURL.indexOf("#") + 1;
			var pageURL = hasHash ? currentURL.replace('#', "&recipe=true") : currentURL + "&recipe=true";
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