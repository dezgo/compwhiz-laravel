@extends('web')

@section('content')
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

    <h2>Pricing</h2>
    <p>
        Computer Whiz pricing is super simple - $120/hr with a minimum 1 hour, then charged in 15min increments after that.
        I'm also happy to provide remote support, in which case there's no minimum.
    </p>
    <p>
        If you decide to book online, you can also pay with a credit card. Otherwise, I'll happily accept cash,
        or bank deposit on the day.
    </p>

    <h2>Services</h2>
    <p>
        You name it, if it's technical, I can probably help! Here's a sample of some of the areas my customers
        typically need help with
    </p>
        <ul>
            <li>Setup of new systems</li>
            <li>Data back up</li>
            <li>New computer sales</li>
            <li>Virus removal</li>
            <li>Internet security</li>
            <li>Training</li>
            <li>PC health checks</li>
            <li>Printer setup / troubleshooting</li>
        </ul>
    <p>
        I support all sorts of equipment
    </p>
        <ul>
            <li>Desktop / Laptop computers (PC and Mac)</li>
            <li>Smart TVs</li>
            <li>Mobiles / Tablets (iOS and Android)</li>
        </ul>

    <h2>Contact</h2>
    <p>
        This is a part-time business for me, which means I can't take calls during business hours. When you contact
        me using any method below, I will be sent an email and will respond to you ASAP.
    </p>
    <p>
        For a quick response, try out the bookings website. Once you book, both you and I will receive an email
        confirmation. If you change your mind or need to reschedule, just contact me and we can arrange it.
        You can even pre-pay by credit card when you book.
    </p>
    <p>
        Email: <a href="mailto:web@computerwhiz.com.au">web@computerwhiz.com.au</a><br>
    </p>
    <p>
        Phone: 02 6112 8025 (direct to voicemail).
    </p>
    <p>
        Book online: <a target="_blank" href="http://computerwhiz.simplybook.me/">http://computerwhiz.simplybook.me</a>
    </p>

    <h2>Subscribe</h2>
        Every now and then something big happens in IT. Maybe it's the retirement of Windows XP, the option
        of a free upgrade to Windows 10, or just a great way to become more productive. As a subscriber, you'll be the
        first to know.

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
