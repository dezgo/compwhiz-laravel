@extends('app')

@section('content1')
    <h1 align="left">Login</h1>
    <form method="POST" action="/auth/login">
        {!! csrf_field() !!}

        <p>
            Email
            <input type="email" name="email" value="{{ old('email') }}">
        </p>

        <p>
            Password
            <input type="password" name="password" id="password">
        </p>

        <p>
            <input type="checkbox" name="remember"> Remember Me
        </p>

        <p>
            <button type="submit">Login</button>
        </p>
    </form>
    @include('errors.list')
@stop

@section('bgimage')
    url('/images/sidebar1.jpg')
@stop
