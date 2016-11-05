@extends ('layouts.master')

@section ('title', 'Skillet User')

@section ('content')

@include ('layouts.partials._initialization')

<div class="animated fadeIn">
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

        @if ($recipes->count() == 0)
            
            <h3>Time to add your creations!!</h3>
        
        @else

            <h3>Your recipes:</h3>
            @foreach ($recipes as $recipe)
                @include('layouts.partials.recipe-index')
            @endforeach

        @endif
    </div>



    <div class="row">
        <div class="col-xs-12 text-center">
            {!! $recipes->render() !!}
        </div>
    </div>

     

    <!-- row -->
    <div class="row">
        

        @if ($upVotedRecipes->count() == 0)
            <h3>No recipes have been up-voted yet.</h3>
        @else
        
            <h3>Recipes up-voted:</h3>
            @foreach ($upVotedRecipes as $recipe)
                @include('layouts.partials.recipe-index')
            @endforeach

        @endif
    </div>

    <div class="row">
        <div class="col-xs-12 text-center">
            {!! $upVotedRecipes->render() !!}
        </div>
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