@extends('app')

@section('content1')
    <h1 align="left">Register</h1>
    <form method="POST" action="/auth/register">
    {!! csrf_field() !!}

    <p>
        Name
        <input type="text" name="name" value="{{ old('name') }}">
    </p>

    <p>
        Email
        <input type="email" name="email" value="{{ old('email') }}">
    </p>

    <p>
        Password
        <input type="password" name="password">
    </p>

    <p>
        Confirm Password
        <input type="password" name="password_confirmation">
    </p>

    <p>
        <button type="submit">Register</button>
    </p>
</form>
@stop

@section('bgimage')
    url('/images/sidebar1.jpg')
@stop
