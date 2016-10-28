@extends ('layouts.master')

@section ('top-scripts')
    <link href="/assets/css/bootstrap-tagsinput.css" rel="stylesheet" type="text/css">
@stop

@section ('title', 'Recipe Creator')

@section ('content')

    <h1 class="h1 text-center">Recipe Creator</h1>

    <div class="wizardContainer">
        <div id="recipeEntry" class="animated row">
            <div class="col-xs-8 col-xs-offset-2">
                @include('layouts.partials.recipe-entry')
            </div>
        </div>

        <div id="ingredientEntry" class="animated row">
            <div class="col-xs-8 col-xs-offset-2">
                @include('layouts.partials.ingredient-entry')
            </div>
        </div>


        <div id="stepEntry" class="animated row">
            <div class="col-xs-8 col-xs-offset-2">
                @include('layouts.partials.step-entry')
            </div>
        </div> 

        <div id="keywordEntry" class="animated row">
            <div class="col-xs-8 col-xs-offset-2">
                @include('layouts.partials.keyword-entry')
            </div>
        </div>    
        
    </div>

@stop

@section('bottom-scripts')
    <script src="/assets/js/bootstrap-tagsinput.js"></script>
    <script>
        'use strict'

        $(document).ready(function() {
            $('#recipeEntry').addClass('fadeIn');
            $('#ingredientEntry').addClass('fadeInRight');
            $('#stepEntry').addClass('hidden');
            $('#keywordEntry').addClass('hidden');

            $("#toStepEntry").click(function() {
                $('#ingredientEntry').removeClass('fadeInRight').addClass('hidden');
                $('#stepEntry').removeClass('hidden').addClass('fadeInRight');
            });

            $("#toKeywordEntry").click(function() {
                $('#stepEntry').removeClass('fadeInRight').addClass('hidden');
                $('#keywordEntry').removeClass('hidden').addClass('fadeInRight');
            });



            $("#toStepEntry").click(function() {
                // $('#ingredientEntry').removeClass('hide').addClass('fadeInRight');
                console.log("click");
            });


        });    

    </script>

@stop