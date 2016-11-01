@extends ('layouts.master')

@section ('title', 'Recipe Editor')

@section ('content')

@include('layouts.partials.modal-skeleton')


<h1 class="h1 text-center">Your New Recipe</h1>
<hr/>

{{-- Start Recipe Creation --}}

<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<button type="button" class="btn btn-lg btn-modal add-recipe"><h2>START</h2><i class="fa fa-chevron-right fa-2x" aria-hidden="true"></i></button>
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