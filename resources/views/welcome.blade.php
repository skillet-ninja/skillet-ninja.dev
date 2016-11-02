@extends('layouts.master')

@section('content')
    <div class=" welcome-title">
        <img src="/assets/img/skillet-ninja-head-pan.png" class="welcome-logo text-center">
        <h1 class="welcomeHeader">Welcome to Skillet Ninja!</h1>
        <h2>A Virtual Cooking Assistant</h2>
    </div>

    <hr>
    {{-- <iframe width="100%" height="750" src="https://www.youtube.com/embed/KLGSLCaksdY?autoplay=1&controls=0&iv_load_policy=3" frameborder="0" allowfullscreen></iframe>     --}}
    <div>
        <ul>
            <li><p class="welcomeContent">Browse recipes.</p></li>
            <li><p class="welcomeContent">Login to cook a recipe with Skillet Ninja.</p></li>
            <li><p class="welcomeContent">Create a recipe to share with the world!</p></li>
            <li><p class="welcomeContent">Happy cooking!</p></li>
        </ul>
    </div>


@stop