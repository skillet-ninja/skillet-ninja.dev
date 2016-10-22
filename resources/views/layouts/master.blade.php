<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="/assets/css/site.css" rel="stylesheet" type="text/css">

        @yield('top-scripts')
        

        @yield('head')

    </head>
    <body>

        @include('layouts.partials.navbar')

        <div class="container">

            @if(session()->has('SUCCESS_MESSAGE'))
                <div class="alert alert-success" role="alert">
                    <p>{{ session('SUCCESS_MESSAGE') }}</p>
                </div>
            @endif

            <div class="content">

                @yield('content')

            </div>

            {{-- @include('layouts.partials.footer') --}}
        
        </div>
        <br>
        <br>
        @include('layouts.partials.footer')


        {{-- jQuery --}}
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha256-/SIrNqv8h6QGKDuNoLGA4iret+kyesCkHGzVUUV0shc=" crossorigin="anonymous"></script>
        {{-- javascript --}}
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
        @yield('bottom-scripts')

    </body>
</html>
