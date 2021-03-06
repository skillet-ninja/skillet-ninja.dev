@extends ('layouts.master')

@section ('title', 'Skillet Ninja - Create')

@section ('modal-title', 'Recipe Creation')

@section ('content')

@include('layouts.partials._initialization')

<div class="animated fadeIn">
	<h1 class="h1 text-center">Your New Recipe</h1>
	<hr/>

	{{-- Start Recipe Creation --}}

	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">
			<button type="button" class="btn btn-lg btn-modal add-recipe customButtonStyle">CREATE <i class="fa fa-chevron-right" aria-hidden="true"></i></button>
		</div>
	</div>
</div>


@stop


@section('bottom-scripts')

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

	</script>

@stop