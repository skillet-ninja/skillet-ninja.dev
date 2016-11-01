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

    <div class="row">
        <div class="col-xs-2">
            <div class="mic-button">
                <label for="mic">Microphone</label>
                <input name="mic" id="mic" type="checkbox" checked data-toggle="toggle" data-style="ios" data-onstyle="success">
            </div>
        </div>

        <div class="col-xs-2">
            <div class="narration-button">
                <label for="mic">Narration</label>
                <input name="narration" id="narration" type="checkbox" checked data-toggle="toggle" data-style="ios" data-onstyle="success"> 
            </div>
        </div>

        <div class="col-xs-4 text-center">
            <h4>Active Timers</h4>
            <table class="table table-condensed text-center">
                <thead>
                    <tr>
                        <th class="text-center">Step</th>
                        <th class="text-center">Time</th>
                        <th class="text-center">Reset</th>
                        <th class="text-center">Pause</th>
                        <th class="text-center">Clear</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($steps as $key => $step)
                        {{-- Timer beep source --}}
                        <audio id="buzzer{{ $key + 1 }}" src="/assets/sounds/timerSound.mp3" type="audio/mp3"></audio>    
                        <tr class="stepTimer{{ $key + 1 }} hidden">
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <div class="timer{{ $key + 1 }}">
                                    <span class="hour{{ $key + 1 }}">00</span>:<span class="minute{{ $key + 1 }}">00</span>:<span class="second{{ $key + 1 }}">00</span>
                                </div>
                            </td>
                            <div class="control{{ $key + 1 }}">
                                <td><button onClick="timer{{ $key + 1 }}.reset({{ $step->time * 60 }})" class="btn-success"><-></button></td>
                                <td><button class="btn-primary" onClick="timer{{ $key + 1 }}.stop()">||</button></td>
                                <td><button id="timerStop{{ $key + 1 }}" onClick="timer{{ $key + 1 }}.reset({{ $step->time * 60 }}); timer{{ $key + 1 }}.stop()" class="btn-danger">X</button></td>
                            </div>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

        <div class="col-xs-2">
            <div class="pull-right">
                <button id="details" type="button" class="btn btn-primary btn-primary btn-view-recipe" data-recipe={{ $recipe->id }}>View Details</button>
            </div>
        </div>

        <div class="col-xs-2">
            <div class="pull-right">
                {{-- @if($recipe->video_url != null) --}}
                    <a id="tutorial" href="{{--{{ $recipe->video_url }}--}}" class="btn btn-primary btn-primary btn-view-recipe" data-recipe={{ $recipe->id }} target="_blank">View Tutorial</a>
                {{-- @endif --}}
            </div>
        </div>
    </div>

    {{-- CAROUSEL --}}
    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
        <div class="row">
            <div class="col-xs-12">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    @foreach ($steps as $key => $step)
                        <div @if ($key === 0) class="item active" @else class="item"  @endif>
                            <div class="carouselWrapper recipe-card">
                                <h1 class="vca-step-header">Step {{ $key + 1 }}</h1>
                                {{-- Voice --}}
                                <p class="vca-step text-center">{{ $step->step }} Take a cup and pour into the bowl for five minutes, stiring occasionally.</p> 
                                @if($step->image_url != null)
                                    <img id="carouselImg" src="{{ $step->image_url }}" alt="...">
                                @endif
                            </div>
                                <div class="row">
                                    @if($step->video_url != null)
                                        <div class="col-xs-6">
                                            <a href="{{ $step->video_url }}" id="viewStep{{ $key + 1 }}" class="btn btn-primary text-center" target="_blank">View Step</a>
                                        </div>
                                    @endif

                                    @if($step->time != null)
                                        <div class="col-xs-6">
                                            <button id="startTimer{{ $key + 1 }}" onClick="timer{{ $key + 1 }}.start(1000)" id="timerStartStep{{ $key + 1 }}" class="btn btn-primary timer text-center">Start Timer</button>
                                        </div>
                                    @endif
                                </div> 
                            </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev" id="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next" id="next">
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
                        <li class="" data-target="#carousel-example-generic" data-slide-to="{{ $key }}"><a class="stepPageButton" id="step{{ $key + 1 }}" href="#{{  $key + 1 }}">{{ $key + 1 }}</a></li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>


@stop




@section('bottom-scripts')
    {{-- Annayang JS for voice control --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/annyang/2.5.0/annyang.min.js"></script>
    
    <script>

        @foreach ($steps as $key => $step)
            // Timer logic from http://codepen.io/anodpixels/pen/dxJmi
            function _timer{{ $key + 1 }}(callback) {
                var time{{ $key + 1 }} = {{ $step->time * 60 }};     //  The default time of the timer
                var mode{{ $key + 1 }} = 1;     //    Mode: count up or count down
                var status{{ $key + 1 }} = 0;    //    Status: timer is running or stopped
                var timer_id{{ $key + 1 }};    //    This is used by the setInterval function
                
                // this will start the timer e.g. start the timer with 1 second interval timer.start(1000) 
                this.start = function(interval{{ $key + 1 }}) {
                    interval{{ $key + 1 }} = (typeof(interval{{ $key + 1 }}) !== 'undefined') ? interval{{ $key + 1 }} : 1000;
             
                    if (status{{ $key + 1 }} == 0) {
                        status{{ $key + 1 }} = 1;
                        timer_id{{ $key + 1 }} = setInterval(function() {
                            switch (mode{{ $key + 1 }}) {
                                default:
                                if(time{{ $key + 1 }}) {
                                    time{{ $key + 1 }}--;
                                    generateTime{{ $key + 1 }}();
                                    if (typeof(callback) === 'function') callback(time{{ $key + 1 }});
                                }
                                break;
                                
                                case 1:
                                if (time{{ $key + 1 }} < 86400) {
                                    time{{ $key + 1 }}++;
                                    generateTime{{ $key + 1 }}();
                                    if (typeof(callback) === 'function') callback(time{{ $key + 1 }});
                                }
                                break;
                            }
                        }, interval{{ $key + 1 }});
                    }
                }
                
                //  Same as the name, this will stop or pause the timer ex. timer.stop()
                this.stop = function() {
                    if (status{{ $key + 1 }} == 1) {
                        status{{ $key + 1 }} = 0;
                        clearInterval(timer_id{{ $key + 1 }});
                    }
                }
                
                // Reset the timer to zero or reset to a custom time e.g. reset to zero second timer.reset(0)
                this.reset = function(sec{{ $key + 1 }}) {
                    sec{{ $key + 1 }} = (typeof(sec{{ $key + 1 }}) !== 'undefined') ? sec{{ $key + 1 }} : 0;
                    time{{ $key + 1 }} = sec{{ $key + 1 }};
                    generateTime{{ $key + 1 }}(time{{ $key + 1 }});
                }
                
                // Change the mode of the timer, count-up (1) or countdown (0)
                this.mode = function(tmode) {
                    mode{{ $key + 1 }} = tmode;
                }
                
                // This method returns the current value of the timer
                this.getTime = function() {
                    return time{{ $key + 1 }};
                }
                
                // This method returns the current mode of the timer count-up (1) or countdown (0)
                this.getMode = function() {
                    return mode{{ $key + 1 }};
                }
                
                // This method returns the status of the timer running (1) or stoped (1)
                this.getStatus = function() {
                    return status{{ $key + 1 }};
                }
                
                // This method will render the time variable to hour:minute:second format
                function generateTime{{ $key + 1 }}() {
                    var second{{ $key + 1 }} = time{{ $key + 1 }} % 60;
                    var minute{{ $key + 1 }} = Math.floor(time{{ $key + 1 }} / 60) % 60;
                    var hour{{ $key + 1 }} = Math.floor(time{{ $key + 1 }} / 3600) % 60;
                    
                    second{{ $key + 1 }} = (second{{ $key + 1 }} < 10) ? '0'+second{{ $key + 1 }} : second{{ $key + 1 }};
                    minute{{ $key + 1 }} = (minute{{ $key + 1 }} < 10) ? '0'+minute{{ $key + 1 }} : minute{{ $key + 1 }};
                    hour{{ $key + 1 }} = (hour{{ $key + 1 }} < 10) ? '0'+hour{{ $key + 1 }} : hour{{ $key + 1 }};
                    
                    $('div.timer{{ $key + 1 }} span.second{{ $key + 1 }}').html(second{{ $key + 1 }});
                    $('div.timer{{ $key + 1 }} span.minute{{ $key + 1 }}').html(minute{{ $key + 1 }});
                    $('div.timer{{ $key + 1 }} span.hour{{ $key + 1 }}').html(hour{{ $key + 1 }});
                }
            }
             
            // example use
            var timer{{ $key + 1 }};
             
            $(document).ready(function(e) {
                timer{{ $key + 1 }} = new _timer{{ $key + 1 }}
                (
                    function(time{{ $key + 1 }}) {
                        if (time{{ $key + 1 }} == 0) {
                            timer{{ $key + 1 }}.stop();
                            $('#start{{ $key + 1 }}').on('click', function() {
                                $('#buzzer{{ $key + 1 }}').play();
                            });
                        }
                    }
                );
                timer{{ $key + 1 }}.reset({{ $step->time * 60 }});
                timer{{ $key + 1 }}.mode(0);
            });

            // Clear timer from timer table
            $('#timerStop{{ $key + 1 }}').click(function() {
                $('.stepTimer{{ $key + 1 }}').addClass('hidden');
                $('#buzzer{{ $key + 1 }}').stop();

            });

            $('#startTimer{{ $key + 1 }}').click(function() {
                $('.stepTimer{{ $key + 1 }}').removeClass('hidden');
            });

        @endforeach

    </script>

    <script>
        // Video Player Logic


    </script>

    {{-- Narration code using jQuery --}}
    <script>
        'use strict'
        
        $(document).ready(function() {

            // Total recipe steps
            var totalSteps = {{ count($steps) }};

            // Current recipe step
            var step = 1;
            
            // Filters step number to cycle up and down through total steps
            function calculateStep(stepperValue) {
                if (stepperValue == 0) {
                    step = totalSteps;
                } else {
                    step = stepperValue % totalSteps;
                }
                return step;
            }

            // Says input
            function sayIt(input) {
                if (document.getElementById('narration').checked) {
                    var msg = new SpeechSynthesisUtterance(input);
                    msg.rate = .9;
                    window.speechSynthesis.speak(msg);
                }
            }

            // Stops narration
            function silence() {
                window.speechSynthesis.cancel();
            }
            
            // Click event for left carousel button click
            $('#prev').click(function() {
                silence();
                step -= 1;
                step = calculateStep(step);
                // Say step number
                sayIt('Step' + step);
                // Say step instruction
                sayIt($('.vca-step')[step -1].innerHTML);
            });

            // Click event for right carousel button click
            $('#next').click(function() {
                silence();
                step += 1;
                step = calculateStep(step);
                 // Say step number
                sayIt('Step' + step);
                // Say step instruction
                sayIt($('.vca-step')[step - 1].innerHTML);
            });

            $('.stepPageButton').click(function() {
                silence();
                var thisId = ($(this).attr('id'));
                step = Number(thisId.substring(4));
                 // Say step number
                sayIt('Step' + step);
                // Say step instruction
                sayIt($('.vca-step')[step -1].innerHTML);
            });

            $("body").keydown(function(e) {
                if (e.keyCode == 37) { // left
                    $("#prev").click();
                } else if (e.keyCode == 39) { // right
                    $("#next").click();
                }    
            });

            // GREETING
            var msg = new SpeechSynthesisUtterance('Welcome to Skillet Ninja.');
            msg.rate = .9;
            window.speechSynthesis.speak(msg);

            

            // CURRENT STEP NUMBER
            var msg = new SpeechSynthesisUtterance($('.vca-step-header')[0].innerHTML);
            msg.rate = .9;
            window.speechSynthesis.speak(msg);


            // CURRENT STEP INSTRUCTION
            var msg = new SpeechSynthesisUtterance($('.vca-step')[0].innerHTML);
            msg.rate = .9;
            window.speechSynthesis.speak(msg);


            {{-- Voice command functionality --}}
            if (document.getElementById('mic').checked) {
                if (annyang) {
                    // Let's define our first command. First the text we expect, and then the function it should call
                    var commands = {
                        'Next': function() {
                            $("#next").click();
                        },
                        'Back': function() {
                            $("#prev").click();
                        },
                        @foreach ($steps as $key => $step)
                            'Step {{ $key + 1 }}': function() {
                                $('#step{{ $key + 1}}').click();
                            },
                        @endforeach
                        'Details': function() {
                            $('#details').click();
                        },
                        'Close': function() {
                            $('.close').click();
                        },
                        @foreach ($steps as $key => $step)
                            'View Step {{ $key + 1 }}': function() {
                                $('#viewStep{{ $key + 1}}').click();
                            },
                        @endforeach
                        'Start': function() {
                            $("#prev").click();
                        },
                        'Stop': function() {
                        },
                        'Repeat Step': function() {
                            $("#step" + step).click();
                        }
                    };

                    // Add our commands to annyang
                    annyang.addCommands(commands);

                    // Start listening. You can call this here, or attach this call to an event, button, etc.
                    annyang.start();
                }

            }
    
        });
    </script>
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
