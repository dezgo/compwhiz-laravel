<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Computer Whiz - Canberra</title>
    <link href="/css/all.css" rel="stylesheet">
    {!! Html::script('/js/image_manipulation.js', array('type' => 'text/javascript')) !!}
</head>

<body id="app-layout">

<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                &nbsp;
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="/">Home</a></li>
                @can('create-invoice')
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Invoicing <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="/customer" name='customersAnchor'>Customers</a></li>
                            <li><a href="/invoice" name='invoicesAnchor'>Invoices</a></li>
                            <li><a href="/invoice_item_category" name='invoiceItemCategoriesAnchor'>Invoice Item Categories</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/customer/select" name='createInvoiceAnchor'>Create Invoice</a></li>
                        </ul>
                    </li>
                @endcan
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}" name='logoutAnchor'><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<div id="wrapper">

    @yield('content')
    <div id="footer">
        <script src="/js/all.js"></script>
        @yield('footer')
        @yield('footer1')
        <span class="glyphicon glyphicon-copyright-mark" aria-hidden="true"></span>
        <small>Computer Whiz - Canberra 2015</small>
    </div>
</div>
</body>
</html>
