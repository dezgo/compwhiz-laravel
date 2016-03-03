@extends('master')

@section('topbar')
<div class='container'>
<img class="left-block" src="{{ url('/images/logo.jpg') }}" />
</div>
@stop

@section('content')
    @yield('content')
@stop
