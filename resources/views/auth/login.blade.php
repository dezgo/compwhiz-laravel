@extends('web')

@section('content')
    <h1 align="left">Login</h1>
    <form method="POST" action="/login">
        {!! csrf_field() !!}

        <div class="form-group">
            {{ Form::label('email', 'Email:', ['class' => 'control-label']) }}
            {{ Form::text('email', old('email'), ['class' => 'control-label', 'autofocus' => 'true']) }}
        </div>

        <div class="form-group">
            {{ Form::label('password', 'Password:', ['class' => 'control-label']) }}
            {{ Form::password('password', old('password'), ['class' => 'control-label', 'autofocus' => 'true']) }}
        </div>

        <div class="form-group">
            <input type="checkbox" name="remember"> Remember Me
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-sign-in"></i>Login
            </button>
        </div>

    </form>
    @include('errors.list')
@stop
