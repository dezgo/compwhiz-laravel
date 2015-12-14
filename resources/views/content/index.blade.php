@extends('app')

@section('bgimage')
    url('/images/sidebar.jpg')
@stop

@section('content1')
    <h1>Home</h1>
    <p>
        Hi, I'm Derek Gillett and I run Computer Whiz - Canberra. This is my own small business which I've run
        from my home since 2009. I previously ran a similar business in Brisbane before moving to Canberra.
    </p>
    <div id="centred">
        <img src="{{asset('images/selfie_bw.jpg')}}">
    </div>
    <p>
        I'm passionate about all things I.T. My aim is to provide expert technical advice and assistance
        in a friendly, easy-to-understand manner to the local community.
    </p>
    <p>
        I currently run this business part-time when not at my full-time job, so I'm usually available weeknights
        and weekends.
    </p>
@stop

