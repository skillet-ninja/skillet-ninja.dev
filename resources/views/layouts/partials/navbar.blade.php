<nav class="navbar navbar-default">
    <div class="container">
       
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">
                        <img class="navLogo" src="/assets/img/skillet-ninja-head-pan-invert.png">
                    </a>
                </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <form class="navbar-form navbar-right" action="{{ action('RecipesController@index')}}" method="GET">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <div class="input-group pull-right">
                          <input type="text" class="form-control" name="searchTerm" placeholder="Search recipes">
                          <span class="input-group-btn">
                            <button type="submit" class="btn btn-default form-control searchButtonStyling" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                          </span>
                        </div><!-- /input-group -->
                    </div><!-- /form-group -->
                </form>

                <ul class="nav navbar-nav navbar-right">
                    
                    <li><a class="searchBarCollapsePadding" href="{{ action('RecipesController@index') }}"> <span class="glyphicon glyphicon-cutlery"></span> Recipes</a></li>

                    @if(Auth::check())
                        <li class="navFont"><a class="navAnchorStyle" href="{{ action('UsersController@show' , Auth::id()) }}"><span class="glyphicon glyphicon-user"></span>  {{ Auth::user()->name }}</a></li>
                        <li class="navFont"><a class="navAnchorStyle" href="{{ action('RecipesController@create' , Auth::id()) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Create Recipe</a></li>
                        <li class="navFont"><a class="navAnchorStyle" href="{{ (action('Auth\AuthController@getLogout')) }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

                    @else
                        <li class="navFont"><a class="navAnchorStyle" href="{{ action('Auth\AuthController@getLogin') }}"><span class="glyphicon glyphicon-user"></span> Signup</a></li>
                        <li class="navFont"><a class="navAnchorStyle" href="{{ action('Auth\AuthController@getLogin') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    @endif
                </ul>
                

    </div><!-- /.navbar-collapse -->

  </div><!-- /.container-fluid -->
</nav>