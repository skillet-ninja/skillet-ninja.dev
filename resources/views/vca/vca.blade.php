@extends('layouts.master')

@section('top-scripts')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@stop


@section('content')

    <style>
        
    </style>
    
    <div class="mic-button">
        <label for="mic">Microphone</label>
        <input name="mic" id="mic" type="checkbox" checked data-toggle="toggle" data-style="ios" data-onstyle="success">
    </div>

    <div class="narration-button">
        <label for="mic">Narration</label>
        <input name="narration" id="narration" type="checkbox" checked data-toggle="toggle" data-style="ios" data-onstyle="success">  
    </div>
    

    {{-- CAROUSEL --}}
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false">
      <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        </ol>

      <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img class="step-image" src="assets/img/logo.png" alt="...">
                <div class="carousel-caption">
                    <h1 class="vca-step-header">Step 1</h1>
                    <p class="vca-step">Chop onion for 5 minutes</p> 
                </div>
            </div>
            <div class="item">
                <img class="step-image" src="assets/img/logo.png" alt="...">
                <div class="carousel-caption">
                    <h1 class="vca-step-header">Step 2</h1>
                    <p class="vca-step">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
        </div>

      <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <button class="btn btn-primary pull-right">View Recipe</button>
    <button class="btn btn-primary pull-right">View Video</button>
    

    

@stop



@section('bottom-scripts')

    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

@stop
