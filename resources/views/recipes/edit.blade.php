@extends ('layouts.master')

@section ('title', 'Skillet Ninja - Edit')

@section ('modal-title', 'Recipe Input')

@section ('content')

@include('layouts.partials._initialization')


<h1 class="h1 text-center">{{ $recipe->name }}</h1>
<hr/>

{{-- Recipe Edit Section --}}
<div class="row">
	<div class="col-sm-12">
		<button type="button" class="btn btn-sm btn-modal edit-recipe pull-right customButtonStyle"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></button><br>
	</div>
</div>

{{-- Basic Recipe Display --}}
<div class ="row">

	{{-- Recipe Image --}}
	<div class="col-md-4">
		<img src="{{ $recipe->image_url }}">
		<p></p>
	</div> <!-- .col-md-4 -->

	{{-- General Information Section --}}
	<div class="col-md-8">
		<div class="row">

			{{-- Description and Time --}}
			<div class="col-md-6">
				<h4>Description</h4>
				<p><em>{{ $recipe->summary }}</em></p>
				<p class="recipe-data"><strong>Servings </strong> {{ $recipe->servings }}</p>
				<p class="recipe-data"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $recipe->overall_time }} min</p>
			</div><!-- sub.col-md-6 -->
			
			<div class="col-md-6">

				<h4>Tags</h4>

				{{-- Tag Edit --}}
				<div class="row">
					@foreach ($recipe->tags as $tag)

					<a href="#" class="btn btn-default customTagStyle text-left remove-item" 
					data-tagId={{ $tag->id }} data-recipeId={{ $recipe->id }}>{{ $tag->tag }}  <i class="fa fa-times" aria-hidden="true"></i></a>

					@endforeach
					<p></p>
				</div> <!-- .row -->


				{{-- Tag Input --}}
				<div class="row">
					<form class="form form-group" action="{{ action('TagController@store') }}" method="POST">
						{!! csrf_field() !!}
						<input type="hidden" name="recipe_id" value="{{ $recipe->id }}">

						<input id="tags" class="form-control bootstrap-tagsinput" data-role="tagsinput" type="text" placeholder="Separate tags with a comma" name="tags" value="">
						<p></p>
						<button class="btn btn-primary customButtonStyle">Add Tags</button>
					</form>
					</div> <!-- .row -->
			</div><!-- sub.col-md-6 -->
		</div> <!-- .row -->
	</div> <!-- .col-md-8 -->
</div> <!-- .row -->

<hr/>

<div class="row">
	
{{-- Ingredient Input --}}
	<div class="col-md-5">
		<h1>Ingredients</h1>
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


	{{-- Step Input --}}
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
			<button type="button" class="list-group-item add-step customButtonStyle"><strong>Add A Step</strong>
				<span class="badge"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
			</button>
		</div><!-- .list-group  -->
	</div> <!-- .col-md-7 -->
</div> <!-- .row  -->


<hr>
<div class="row">
	<div class="col-sm-12">
		<a href="{{ action('UsersController@show', Auth::id()) }}" class="btn btn-default customButtonStyle btn-lg">DONE</a>
	</div><!-- .col-sm-12 -->
</div> <!-- .row  -->


@stop


@section('bottom-scripts')
	
	
	<script>

 		$(".remove-item").on('click',function(e){
            e.preventDefault();
            console.log(e.target);
            var id = $(e.target).data('tagid');
            console.log(id);
				$.ajax({
				    url: '/tags/' + id +'?recipeId={{ $recipe->id }}',
				    data: { "_token": "{{ csrf_token() }}" },
				    type: 'DELETE',
				    success: function(result) {
				        console.log(result);
				    }
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