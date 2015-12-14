@extends('app')

@section('content1')
    <h1>Subscribe</h1>
    <p>
        Every now and then something big happens in IT. Maybe it's the retirement of Windows XP, the option
        of a free upgrade to Windows 10, or just a great way to become more productive. As a subscriber, you'll be the
        first to know.
    </p>
@stop

@section('bgimage')
url('/images/sidebar2.jpg')
@stop

@section('content2')
    <div id="centred">
    <iframe
            style="border:0;"
            src="http://computerwhiz.us9.list-manage.com/subscribe?u=5db68ecae19c0b38fd53cbcc3&id=63485850eb"
            width="650px"
            height="700px"
            >
    </iframe>
    </div>
@stop
