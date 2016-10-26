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
    
    {{-- /assets/img/logo.png THIS WAS THE ORIGINAL IMAGE --}}

    {{-- CAROUSEL --}}
    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
        

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">

            @foreach ($steps as $key => $step)
                <div  @if ($key === 0) class="item active" @else class="item"  @endif">
                    <img class="step-image" id="carouselImg" src="{{ '/assets/img/logo.png' }}" alt="...">
                    <div class="carousel-caption">
                        <h1 class="vca-step-header">Step {{ $key + 1 }}</h1>
                        <p class="vca-step">{{ $step->step }}</p> 
                    </div>
                </div>
            @endforeach
            
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

        <!-- Indicators -->
        <ol class="carousel-linked-nav pagination">

            @foreach ($steps as $key => $step)
                <li class="" data-target="#carousel-example-generic" data-slide-to="{{ $key }}"><a href="#{{  $key + 1 }}">{{ $key + 1 }}</a></li>
            @endforeach
        </ol>
    </div>

    <br>

   @include('layouts.partials.recipe-modal')
    <button class="btn btn-primary pull-right">View Video</button>

    

@stop



@section('bottom-scripts')

    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
        
        $('.rating input').change(function () {
          var $radio = $(this);
            $('.rating .selected').removeClass('selected');
            $radio.closest('label').addClass('selected');
        });

    </script>

    {{-- http://jsfiddle.net/juddlyon/Q2TYv/10/ --}}
    <script>
        console.log("does this work");
        // invoke the carousel
        $('#myCarousel').carousel({
          interval: 3000
        });

        /* SLIDE ON CLICK */ 

        $('.carousel-linked-nav > li > a').click(function() {

            // grab href, remove pound sign, convert to number
            var item = Number($(this).attr('href').substring(1));

            // slide to number -1 (account for zero indexing)
            $('#myCarousel').carousel(item - 1);

            // remove current active class
            $('.carousel-linked-nav .active').removeClass('active');

            // add active class to just clicked on item
            $(this).parent().addClass('active');

            // don't follow the link
            return false;
        });

        /* AUTOPLAY NAV HIGHLIGHT */

        // bind 'slid' function
        $('#myCarousel').bind('slide', function() {

            // remove active class
            $('.carousel-linked-nav .active').removeClass('active');

            // get index of currently active item
            var idx = $('#myCarousel .item.active').index();

            // select currently active item and add active class
            $('.carousel-linked-nav li:eq(' + idx + ')').addClass('active');

        });

    </script>

@stop
