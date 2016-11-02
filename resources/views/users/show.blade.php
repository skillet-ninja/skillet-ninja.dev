@extends ('layouts.master')

@section ('title', 'Skillet User')

@section ('content')

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
        <div class="col-xs-12 text-center">
            <i class="fa fa-user fa-5x text-center centered" aria-hidden="true"></i>
            <h1 class="text-center">{{ $user->name }}</h1>
            <h3>{{ $user->email }}</h3>
            <a href="{{ action('UsersController@edit', $user->id) }}" class="btn btn-primary btn-success btn-edit-account customButtonStyle"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Profile</a>
        </div>
    </div>
<hr>
<div class="row">
    <h1>{{ $user->name }}'s recipes:</h1>
</div>


<div class="row">
    @if (!isset($user->recipes))
        <h2>No recipes have been added by {{ $user->name }} yet.</h2>
    @endif

    @foreach ($recipesCreated as $recipe)
        @include('layouts.partials.recipe-index')
    @endforeach

<div class="row">
    <div class="col-xs-6 col-xs-offset-3 text-center">
        {!! $recipesCreated->render() !!}
    </div>
</div>


</div>  

<!-- row -->

<div class="row">
    <h1>Recipes {{ $user->name }} likes:</h1>

    @foreach ($recipesVotedFor as $recipe)
        @include('layouts.partials.recipe-index')
    @endforeach
</div>

<div class="row">
    <div class="col-xs-6 col-xs-offset-3 text-center">
        {!! $recipesVotedFor->render() !!}
    </div>
</div>


@stop

@section('bottom-scripts')
    <script type="text/javascript">

        $('.btn-view-recipe').on('click', function(e){
            var recipeId = e.target.getAttribute("data-recipe");
            $.get("/recipes/" + recipeId + "?continue=false", function(data){
            $(".recipe-modal").html(data);
            });
            $('#myModal').modal('show');
        });

    </script>

@stop 