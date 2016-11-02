
@extends('layouts.master')


    @if ($errors->has('name'))
        {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
    @endif

    @if ($errors->has('email'))
        {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
    @endif

    @if ($errors->has('password'))
        {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
    @endif

@section('content')

    <h1 class="text-center">Account Edit</h1>
    <hr>

    <div class="row">
        <div class="col-md-4">
            <i class="fa fa-user fa-5x pull-left" aria-hidden="true"></i>
                <h1>{{ $user->name }}</h1>
                <h3>{{ $user->email }}</h3><br>
        </div>
    <div class="col-md-4">


    <form method="POST" action="{{ action('UsersController@update', $user->id) }}">
        {!! csrf_field() !!}
        {!! method_field('PUT') !!}

        <div class="form-group ">
            <label for="name">Username</label>
            <input type="text" class="form-control" name="name" value="{{ (old('name') == null) ? $user->name : old('name') }}">
        </div>

        <div class="form-group ">
            <label for="email">Email address</label>
            <input type="text" class="form-control" name="email" value="{{ (old('email') == null) ? $user->email : old('email') }}">
        </div>

        <div class="form-group ">
            <label for="password">Password</label>
            <input class="form-control" name="password" value="">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Password Confirmation</label>
            <input type="password" class="form-control" name="password_confirmation">
        </div>

      <button type="submit" class="btn btn-default btn-success customButtonStyle">Submit</button>
        <form action="{{action('UsersController@destroy', $user->id)}}" method="POST">
            {!! csrf_field() !!}
            {!! method_field('DELETE')!!}
            <button type="submit" class="btn btn-danger pull-right customButtonStyle" >Delete Account</button>
        </form>
    </form>

    </div> <!-- form -->
</div>

@stop