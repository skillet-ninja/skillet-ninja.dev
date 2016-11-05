@extends('layouts.master')

@section('content')
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <h2>Login</h2>
                <form method="POST" action="{{ action('Auth\AuthController@postLogin') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button type="submit" class="btn btn-success customButtonStyle center-block">Login</button>
                </form>
            </div>
        </div>

        @if(count($errors))
            <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>

            @endforeach
            </div>
        @endif
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <h2>Register</h2>
                <form method="POST" action="{{ action('Auth\AuthController@postRegister') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Password Confirmation:</label>
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-success customButtonStyle center-block">Register</button>
                </form>
            </div>
        </div>
        
    </div>

@stop