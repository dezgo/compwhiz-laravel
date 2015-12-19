@extends('master')

@section('content')
    <div id="navigation">
        <div id="navigation_im"></div>
        <?php
        if (Request::segment(1) == '') $btn1 = 'r'; else $btn1 = '';
        if (Request::segment(1) == 'about') $btn2 = 'R'; else $btn2 = '';
        if (Request::segment(1) == 'services') $btn3 = 'r'; else $btn3 = '';
        if (Request::segment(1) == 'contact') $btn4 = 'r'; else $btn4 = '';
        if (Request::segment(1) == 'subscribe') $btn5 = 'r'; else $btn5 = '';
        ?>
        <div id="btn01">
            <a href="/" target="_self" onmouseover="MM_swapImage('Image8','','/images/btn01r.jpg',1)" onmouseout="MM_swapImgRestore()">
                <img src="/images/btn01{{ $btn1 }}.jpg" alt="home" name="Image8" width="85" height="34" border="0" id="Image8" />
            </a>
        </div>
        <div id="btn02">
            <a href="/about" target="_self" onmouseover="MM_swapImage('Image2','','/images/btnPricingR.jpg',0)" onmouseout="MM_swapImgRestore()">
                <img src="/images/btnPricing{{ $btn2 }}.jpg" alt="about" name="Image2" width="86" height="34" border="0" id="Image2" />
            </a>
        </div>
        <div id="btn03"><a href="/services" target="_self" onmouseover="MM_swapImage('Image7','','/images/btn03r.jpg',1)" onmouseout="MM_swapImgRestore()">
                <img src="/images/btn03{{ $btn3 }}.jpg" alt="services" name="Image7" width="85" height="34" border="0" id="Image7" />
            </a>
        </div>
        <div id="btn04"><a href="/contact" target="_self" onmouseover="MM_swapImage('Image9','','/images/btn04r.jpg',1)" onmouseout="MM_swapImgRestore()">
                <img src="/images/btn04{{ $btn4 }}.jpg" alt="contact" name="Image9" width="85" height="34" border="0" id="Image9" />
            </a>
        </div>
        <div id="btn05"><a href="/subscribe" target="_self" onmouseover="MM_swapImage('Image10','','/images/btn05r.jpg',1)" onmouseout="MM_swapImgRestore()">
                <img src="/images/btn05{{ $btn5 }}.jpg" alt="subscribe" name="Image10" width="171" height="34" border="0" id="Image10" />
            </a>
        </div>
    </div>
    <div id="sidebar" style="background-image: @yield('bgimage')"></div>
    <div id="content">
        @yield('content1')
    </div>
    <div id="rightbar">
        @yield('rightbar')
    </div>
    <div id="content2">
        @yield('content2')
    </div>

@endsection
