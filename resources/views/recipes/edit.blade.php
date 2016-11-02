@extends ('layouts.master')

@section ('title', 'Recipe Editor')

@section ('content')

	@include('layouts.partials.modal-skeleton')


<h1 class="h1 text-center">{{ $recipe->name }}</h1>
<hr/>

<div class="row">
		<button type="button" class="btn btn-sm btn-modal edit-recipe pull-right"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></button><br>

	<div class="col-md-4">
		<img src="{{ $recipe->image_url }}">
		<p></p>
		<p><strong>Recipe video at </strong> {{ $recipe->tutorial_url }}</p>
		{{-- <p>{{ $recipe->video_url }}</p> --}}
	</div> <!-- .col-md-4 -->

	<div class="col-md-8">
		<div class="row">
			<div class="col-md-6">
				<h4>Description</h4>
				<p><em>{{ $recipe->summary }}</em></p>
				<p><span class="recipe-data"><strong>Servings </strong> {{ $recipe->servings }}</span>
				   <span class="recipe-data"><strong>Total Time </strong> {{ $recipe->overall_time }}</span></p>
				</p>
			</div><!-- .col-md-6 -->
			
			{{-- Tag Input --}}
			<div class="col-md-6">
				<h4>Tags</h4>
					@foreach ($recipe->tags as $tag)
							{{ $tag->tag }} 
					@endforeach
{{-- 
				@if (!isset($recipe->tags))

					<form class="form form-group" action="{{ action('TagController@store') }}" method="POST">
						{!! csrf_field() !!}
						<input class="form-control" type="hidden" name="recipe_id" value="{{ $recipe->id }}">
						<input id="tags" class="form-control" data-role="tagsinput" type="text" placeholder="" name="tags[]" value="">
						<button class="btn btn-primary">Add Tags</button>
					</form>

				@else --}}
					<form class="form form-group" action="{{ action('TagController@update') }}" method="POST" id="tagCreate" name="tagCreate">
							{!! csrf_field() !!}
							{!! method_field('PUT') !!}

						<input class="form-control" type="hidden" name="recipe_id" value="{{ $recipe->id }}">
						<input id="tags" class="form-control" data-role="tagsinput" type="text" placeholder="" name="tags" value="">
						<button class="btn btn-primary">Update Tags</button>
					</form>

				{{-- @endif --}}


			</div><!-- .col-md-6 -->

		</div> <!-- .row -->
	</div> <!-- .col-md-8 -->
</div> <!-- .row -->
<hr/>


<div class="row">
	<div class="col-md-5">
		<h1>Ingredients</h1>
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



	<div class="col-md-7">
		<h1>Steps</h1>

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



	</div> <!-- .col-md-5 -->
</div> <!-- .row  -->


@stop


@section('bottom-scripts')
	
<script src="/assets/js/bootstrap-tagsinput.js"></script>
	
	<script>

	$("#tags").tagsinput('items');

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