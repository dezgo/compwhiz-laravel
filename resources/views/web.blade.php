@extends('master')

@section('topbar')
@include('topbar')
@stop

@section('copyright')
<span class="glyphicon glyphicon-copyright-mark" aria-hidden="true"></span>
<small>Computer Whiz - Canberra 2015</small>
@stop

@section('content')
    @yield('content')
@stop

@section('footer')
    @yield('footer')
    @yield('footer1')
@stop
