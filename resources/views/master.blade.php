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
    <div id="login-status">
        <p>
            <?php
            if (Auth::check())
            {
                $user = Auth::user();
                echo 'Hi '. $user->name.'!&nbsp;';
                echo Html::link('', 'Home').'&nbsp';
                echo Html::link('/admin/invoice', 'Invoicing').'&nbsp';
                echo Html::link('/auth/logout', 'Logout');
            }
            else
            {
                echo Html::link('/auth/register', 'Register').'&nbsp';
                echo Html::link('/auth/login', 'Login');
            }
            ?>
        </p>
    </div>
    &nbsp;
    <div id="header"></div>
    @yield('content')
    <div id="footer">
        <script src="/js/all.js"></script>
        @yield('footer')
        <p>COMPUTER WHIZ CANBERRA 2015</p>
    </div>
</div>
</body>
</html>