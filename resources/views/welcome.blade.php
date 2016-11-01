@extends('layouts.master')

@section('content')
    <div class=" welcome-title">
        <img src="/assets/img/skillet-ninja-logo-edited.png" class="welcome-logo text-center">
        <h1 class="welcomeHeader">Welcome to Skillet Ninja!</h1>
        <h2>A Virtual Cooking Assistant</h2>
    </div>

    {{-- <iframe width="100%" height="750" src="https://www.youtube.com/embed/KLGSLCaksdY?autoplay=1&controls=0&iv_load_policy=3" frameborder="0" allowfullscreen></iframe>     --}}
    <div>
        <ul>
            <li><h3>Browse Recipes</h3></li>
            <li><h3>When you find a recipe to cook, login or register to use Skillet!</h3></li>
            <li><h3>After you login, click the create button to share your recipe with the world!</h3></li>
            <li><h3>Happy cooking!</h3></li>
        </ul>
    </div>


@stop