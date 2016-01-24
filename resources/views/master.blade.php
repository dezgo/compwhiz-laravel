<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Computer Whiz - Canberra</title>
    <link href="/css/all.css" rel="stylesheet">
    {!! Html::script('/js/image_manipulation.js', array('type' => 'text/javascript')) !!}
</head>

<body id="app-layout">
    @yield('topbar')
    <div id="wrapper">
        @yield('content')

        <div id="footer">
            <script src="/js/all.js"></script>
            @yield('footer')
            @yield('copyright')
        </div>

    </div>
</body>
</html>
