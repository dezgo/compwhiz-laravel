<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Computer Whiz - Canberra</title>
    <link href="{{ url('/css/all.css') }}" rel="stylesheet">
    @yield('head')
</head>

<body id="app-layout">
    @yield('topbar')
    <div class="container">
        @yield('content')

        <div id="footer">
            <script src="/js/all.js"></script>
            @yield('footer')
            <br />
            @yield('copyright')
        </div>

    </div>
</body>
</html>
