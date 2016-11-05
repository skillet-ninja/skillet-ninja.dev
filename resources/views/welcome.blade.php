@extends('layouts.master')

@section ('modal-title', 'Check out...')

@section('content')


@include('layouts.partials._initialization')

    <div class="animated fadeIn">
        <div class="row">
            <div class=" welcome-title">
                <img src="/assets/img/skillet-ninja-head-pan.png" class="welcome-logo text-center">
                <div class="col-xs-12">
                    <h1 class="welcomeHeader">Welcome to Skillet Ninja!</h1>
                    <h3>A Virtual Cooking Assistant</h3>
                </div>
            </div>
        </div>

        <hr>
        
        <div class="row">
            <div class="col-xs-12">
                <div>
                    <ul class="list-unstyled">
                        <li><p class="welcomeContent"><a href="/recipes">Browse</a> recipes.</p></li>
                        <li><p class="welcomeContent"><a href="/auth/login">Login</a> to cook a recipe with Skillet Ninja.</p></li>
                        <li><p class="welcomeContent">Create a recipe to share with the world!</p></li>
                        <li><p class="welcomeContent">Happy cooking!</p></li>
                    </ul>
                </div>
            </div>
        </div>

        <br>

        <h2 class="text-center">Today's Top Recipes</h2>
        <hr>
        <div class="row">
            @foreach ($recipes as $recipe)
                @include('layouts.partials.recipe-card')
            @endforeach
        </div> 

        <br>
    </div>

@stop


@section('bottom-scripts')

    <script type="text/javascript">
    
    $('.btn-view-recipe').on('click', function(e){
        var recipeId = e.target.getAttribute("data-recipe");
        $.get("/recipes/" + recipeId, function(data){
        $(".recipe-modal").html(data);
        });
        $('#myModal').modal('show');
    });

    </script>

@stop