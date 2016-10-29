@extends ('layouts.master')

@section ('title', 'Recipe Editor')

@section ('content')

    @include('layouts.partials.modal-skeleton')


    <h1 class="h1 text-center">Recipe Editor</h1>
    <hr/>

    <div class="row">
        <div class="col-md-4">
            <img src="{{ $recipe->image_url }}">
        </div>
        <div class="col-md-4">
            <button type="button" class="btn btn-sm btn-modal edit-recipe pull-right"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></button>
            <h1>{{ $recipe->name }}</h1>
            <p><em>{{ $recipe->summary }}</em></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <p><span class="recipe-data"><strong>SERVINGS</strong> {{ $recipe->servings }}</span>
               <span class="recipe-data"><strong>Total Time</strong> {{ $recipe->overall_time }}</span></p>
            <p><span class="recipe-data"><strong>Tags</strong>
                @foreach ($recipe->tags as $tag)
                    {{ $tag->tag }}
                @endforeach
            </p>
            {{-- <p>{{ $recipe->video_url }}</p> --}}

        </div>

    </div>


@stop


@section('bottom-scripts')

    <script type="text/javascript">

        $('.edit-recipe').on('click', function(e){
            var currentURL = $(location).attr("href");
            var hasHash = currentURL.indexOf("#") + 1;
            var pageURL = hasHash ? currentURL.replace('#', "?recipe=true") : currentURL + "?recipe=true";
            $.get(pageURL, function(data){
                $(".recipe-modal").html(data);
            });
            $('#myModal').modal('show');
        });

        $('.edit-ingredient').on('click', function(e){
            var currentURL = $(location).attr("href");
            var hasHash = currentURL.indexOf("#") + 1;
            var pageURL = hasHash ? currentURL.replace('#', "?ingredient=true") : currentURL + "?ingredient=true";
            $.get(pageURL, function(data){
                $(".recipe-modal").html(data);
            });
            $('#myModal').modal('show');
        });

        $('.edit-step').on('click', function(e){
            var currentURL = $(location).attr("href");
            var hasHash = currentURL.indexOf("#") + 1;
            var pageURL = hasHash ? currentURL.replace('#', "?step=true") : currentURL + "?step=true";
            $.get(pageURL, function(data){
                $(".recipe-modal").html(data);
            });
            $('#myModal').modal('show');
        });


    </script>

@stop