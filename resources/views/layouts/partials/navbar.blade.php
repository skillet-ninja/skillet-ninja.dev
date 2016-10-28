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
            <a class="navbar-brand" href="/">Skillet Ninja</a>
        </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <form class="navbar-form navbar-right" action="{{ action('RecipesController@index')}}" method="GET">
            {!! csrf_field() !!}
            <div class="form-group">
        <label>Search by Difficulty</label>
            <select class="form-control" name="searchDifficulty">
                <option value="null" selected>None</option>
                <option value="beginner">beginner</option>
                <option value="intermediate">intermediate</option>
                <option value="expert">expert</option>
            </select>
            <br>
                    <label>Search by Tags</label>
                  <input type="radio" name="searchParameter" value="tag" checked>
                  <br>
                  <label>Search by Name</label>
                  <input type="radio" name="searchParameter" value="name">
                  <br>
                <input type="text" class="form-control input-lg" placeholder="Search Recipes" name="search_recipe"/>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>

        <ul class="nav navbar-nav navbar-right">
            
{{-- REPLACE THESE PLACEHOLDERS WITH COMMENTED OUT LINES BELOW --}}
            <li><a href="{{ action('RecipesController@index') }}"> <span class="glyphicon glyphicon-cutlery"></span>  Recipes</a></li>
            {{-- <li><a href="{{ action('RecipesController@index' }}">Recipes</a></li> --}}

            @if(Auth::check())
                <li><a href="{{ action('UsersController@show' , Auth::id()) }}"><span class="glyphicon glyphicon-user"></span>  {{ Auth::user()->name }}</a></li>
                <li><a href="{{ action('RecipesController@create' , Auth::id()) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>    Create Recipe</a></li>
                <li><a href="{{ (action('Auth\AuthController@getLogout')) }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            @else
                <li><a href="{{ action('Auth\AuthController@getLogin') }}"><span class="glyphicon glyphicon-user"></span>Signup</a></li>
                <li><a href="{{ action('Auth\AuthController@getLogin') }}"><span class="glyphicon glyphicon-log-in"></span>  Login</a></li>
            @endif
            <li><a href="{{ '/users/about' }}">About</a></li> 
        </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>