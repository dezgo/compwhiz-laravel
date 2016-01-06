<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Computer Whiz - Canberra</title>
    <link href="/css/all.css" rel="stylesheet">
    {!! Html::script('/js/image_manipulation.js', array('type' => 'text/javascript')) !!}
</head>

<body onload="MM_preloadImages('/images/btn01r.jpg','/images/btnPricingR.jpg','/images/btn03r.jpg','/images/btn04r.jpg','/images/btn05r.jpg')">
<div id="wrapper">
    @yield('content')
    <div id="footer">
        <script src="/js/all.js"></script>
        @yield('footer')
        <span class="glyphicon glyphicon-copyright-mark" aria-hidden="true"></span>
        <small>Computer Whiz - Canberra 2015</small>
    </div>
</div>
</body>
</html>
