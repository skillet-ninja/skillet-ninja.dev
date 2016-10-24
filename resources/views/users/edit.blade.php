
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
    <form method="POST" action="{{ action('UsersController@update', $user->id) }}">
        {!! csrf_field() !!}
        {!! method_field('PUT') !!}
        Name: <input type="text" name="name" value="{{ (old('name') == null) ? $user->name : old('name') }}">
        <br>
        Email: <input type="text" name="email" value="{{ (old('email') == null) ? $user->email : old('email') }}">
        <br>
        Password: <input name="password" value="">
        <br>
        <button class="btn btn-primary">Submit</button>
    </form>
@stop