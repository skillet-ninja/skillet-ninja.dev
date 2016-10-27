@extends('layouts.master')

@section('top-scripts')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@stop


@section('content')

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


    <div class="mic-button">
        <label for="mic">Microphone</label>
        <input name="mic" id="mic" type="checkbox" checked data-toggle="toggle" data-style="ios" data-onstyle="success">
    </div>

    <div class="narration-button">
        <label for="mic">Narration</label>
        <input name="narration" id="narration" type="checkbox" checked data-toggle="toggle" data-style="ios" data-onstyle="success"> 
    </div>
    
    <div class="pull-right">
    <button type="button" class="btn btn-primary btn-primary btn-view-recipe" data-recipe={{ $recipe->id }}>
        View {{ $recipe->name}}</button>
    </div>
    


    {{-- CAROUSEL --}}
    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
        <div class="row">
            <div class="col-xs-12">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    @foreach ($steps as $key => $step)
                        <div  @if ($key === 0) class="item active" @else class="item"  @endif>
                            <div class="carouselWrapper recipe-card">
                                <h1 class="vca-step-header">Step {{ $key + 1 }}</h1>
                                <p class="vca-step text-center">{{ $step->step }}</p> 
                                <button class="btn btn-primary">View Step</button>
                                <br><br>
                                <img id="carouselImg" src="{{ '/assets/img/logo.png' }}" alt="...">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

    </div>
    <div>
        <div class="row">
            <!-- Indicators -->
            <div class="col-md-offset-2 col-md-8 carouselPagination">
                <ol class="carousel-linked-nav pagination">
                    @foreach ($steps as $key => $step)
                        <li class="" data-target="#carousel-example-generic" data-slide-to="{{ $key }}"><a href="#{{  $key + 1 }}">{{ $key + 1 }}</a></li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>


@stop



@section('bottom-scripts')

    <script>
        
        $('.rating input').change(function () {
          var $radio = $(this);
            $('.rating .selected').removeClass('selected');
            $radio.closest('label').addClass('selected');
        });

        {{-- modal functionality --}}
        $('.btn-view-recipe').on('click', function(e){
            var recipeId = e.target.getAttribute("data-recipe");
            $.get("/recipes/" + recipeId + "?continue=true", function(data){
            $(".recipe-modal").html(data);
            });
            $('#myModal').modal('show');
        });

    </script>

    {{-- http://jsfiddle.net/juddlyon/Q2TYv/10/ --}}
    <script>

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
