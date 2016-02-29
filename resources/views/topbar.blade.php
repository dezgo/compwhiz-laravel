<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#app-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="/">
                <i class="glyphicon glyphicon-home">&nbsp;</i>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            @if(Gate::check('authenticated'))
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" id="dropdownMenu1"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Invoicing <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="/invoice" name='invoicesAnchor'>Invoices</a></li>
            @endif

            @if(Gate::check('create-invoice'))
                            <li><a href="/invoice_item_category" name='invoiceItemCategoriesAnchor'>
                                Invoice Item Categories</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/user/select" name='createInvoiceAnchor'>
                                Create Invoice</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/settings" name='settingsAnchor'>Settings</a></li>
            @endif

            @if(Gate::check('super-admin'))
                            <li><a href="/user" name='userAnchor'>Users</a></li>
            @endif


            @if(Gate::check('authenticated'))
                        </ul>
                    </li>
                </ul>
            @endif

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->full_name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/user/'.Auth::user()->id.'/edit') }}">Edit Profile</a></li>
                            <li><a href="{{ url('/logout') }}" name='logoutAnchor'><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
