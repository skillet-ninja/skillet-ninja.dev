@extends ('layouts.master')

@section ('title', 'Recipe Editor')

@section ('content')

	@include('layouts.partials.modal-skeleton')


	<h1 class="h1 text-center">Recipe Editor</h1>
	<hr/>

	<div class="row">
			<button type="button" class="btn btn-sm btn-modal edit-recipe pull-right"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></button><br>
		<div class="col-md-4">
			<img src="{{ $recipe->image_url }}"><br>
			<p>Video URL to go here</p>
			{{-- <p>{{ $recipe->video_url }}</p> --}}
		</div>
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
			</div>
		</div>
	</div>
	<hr/>
	<div class="row">
	<div class="col-md-5">
		<h1>Ingredients <small>click item to edit</small></h1>
			<div class="list-group">
				@foreach ($recipe->ingredients as $ingredient)
				  <button type="button" class="list-group-item edit-ingredient">

					{{$ingredient->pivot->amount}} of {{ $ingredient->ingredient }}
					<span class="badge"><i class="fa fa-pencil" aria-hidden="true"></i></span>
				  </button>
				@endforeach
				<button type="button" class="list-group-item add-ingredient">Add An Ingredient
					<span class="badge"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
				  </button>
			</div>
		</div>

		<div class="col-md-5 col-md-offset-1">
			<h1>Steps <small>click item to edit</small></h1>
			<div class="list-group">
				@foreach ($recipe->steps as $step)
				  <button type="button" class="list-group-item edit-ingredient">
					{{ $step->step }}
					<span class="badge"><i class="fa fa-pencil" aria-hidden="true"></i></span>
				  </button>
				@endforeach
				<button type="button" class="list-group-item add-ingredient">Add A Step
					<span class="badge"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
				  </button>
			</div>



	</div>


@stop


@section('bottom-scripts')

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
            $.get("/recipes/" + recipeId + "?continue=false", function(data){
            $(".recipe-modal").html(data);
            });
            $('#myModal').modal('show');
        });


	</script>

@stop