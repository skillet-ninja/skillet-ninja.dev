
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

    {{-- User Information --}}
    <div class="row">
        <div class="col-md-4">
            <i class="fa fa-user fa-5x pull-left" aria-hidden="true"></i>
                <h1>{{ $user->name }}</h1>
                <h3>{{ $user->email }}</h3><br>
        </div>

    {{-- User Information Edit  --}}
    <div class="col-md-4">

    <form method="POST" action="{{ action('UsersController@update', $user->id) }}">
        {!! csrf_field() !!}
        {!! method_field('PUT') !!}

        {{-- Username Input --}}
        <div class="form-group ">
            <label for="name">Username</label>
            <input type="text" class="form-control" name="name" value="{{ (old('name') == null) ? $user->name : old('name') }}">
        </div>

        {{-- Email Address Input --}}
        <div class="form-group ">
            <label for="email">Email address</label>
            <input type="text" class="form-control" name="email" value="{{ (old('email') == null) ? $user->email : old('email') }}">
        </div>

        {{-- Confirm With Password --}}
        <div class="form-group ">
            <label for="password"></label>
            <input class="form-control" type="password" name="password" placeholder="Enter password to confirm changes">
        </div>

        {{-- Password Confirmation --}}
        <div class="form-group">
            <label for="password_confirmation"></label>
            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password">
        </div>

        <div class="row">
            <div class="col-xs-4 col-xs-push-5">
                <a href="{{ action('UsersController@show', $user->id) }}" class="btn btn-default customButtonStyle">Cancel</a>
            </div>
            <div class="col-xs-2 col-xs-push-5">
              <button type="submit" class="btn btn-default btn-success customButtonStyle">Submit</button>
            </div>
    </form>
            <div class="col-xs-6 col-xs-pull-6">
                <form class="form" action="/users/{{ $user->id }}" method="POST">
                    {!! csrf_field() !!}
                    {!! method_field('DELETE')!!}
                    <button type="submit" class="btn btn-danger customButtonStyle" >Delete</button>
                </form>
            </div>

        </div> <!-- .col-md-4 -->
</div>

@stop