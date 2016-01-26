@extends('web')

@section('content')
    <h1>Home</h1>
    <div class="row">
        <div class="col-md-6">
        Hi, I'm Derek Gillett and I run Computer Whiz - Canberra. This is my own small business which I've run
        from my home since 2009. I previously ran a similar business in Brisbane before moving to Canberra.<br />
        <br />
        I'm passionate about all things I.T. My aim is to provide expert technical advice and assistance
        in a friendly, easy-to-understand manner to the local community.<br />
        <br />
        I currently run this business part-time when not at my full-time job, so I'm usually available weeknights
        and weekends.<br />
        <br />
        </div>
        <div class="col-md-6">
            <img src="{{asset('/images/selfie_bw.jpg')}}">
        </div>
    </div>
@stop
