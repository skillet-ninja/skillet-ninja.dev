<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Skillet Ninja</a>
        </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <form class="navbar-form navbar-right">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>

        <ul class="nav navbar-nav navbar-right">
            
{{-- REPLACE THESE PLACEHOLDERS WITH COMMENTED OUT LINES BELOW --}}
            <li><a href="#"> <span class="glyphicon glyphicon-cutlery"></span>  Recipes</a></li>
            {{-- <li><a href="{{ action('RecipesController@index' }}">Recipes</a></li> --}}

            @if(Auth::check())
                <li><a href="{{ action('UsersController@show' , Auth::id()) }}"><span class="glyphicon glyphicon-user"></span>  {{ Auth::user()->name }}</a></li>
                <li><a href="{{ action('RecipesController@create' , Auth::id()) }}">Create Recipe</a></li>
                <li><a href="{{ (action('Auth\AuthController@getLogout')) }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            @else
REPLACE THESE PLACEHOLDERS WITH COMMENTED OUT LINES BELOW
                <li><a href="#"><span class="glyphicon glyphicon-user"></span>  Sign Up</a></li>
                <li><a href="{{ action('Auth\AuthController@getRegister') }}"><span class="glyphicon glyphicon-user"></span>Signup</a></li>
                <li><a href="{{ action('Auth\AuthController@getLogin') }}"><span class="glyphicon glyphicon-log-in"></span>  Login</a></li>
            @endif
            <li><a href="#">About</a></li> 
        </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>