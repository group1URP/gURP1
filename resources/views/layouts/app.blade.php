<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top white-text text-center navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed white-text" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only white-text">Toggle Navigation</span>
                        <span class="icon-bar white-text"></span>
                        <span class="icon-bar white-text"></span>
                        <span class="icon-bar white-text"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand white-text" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav white-text">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a class='white-text' href="/feed">Feed</a></li>
                            <li><a class='white-text' href="/browse">Browse</a></li>
                            <li><a class='white-text' href="/#about">About Us</a></li>
                            <li><a class='white-text' href="/#contact">Contact</a></li>
                            <li><a type="button" class='white-text' href="{{ route('login') }}"><button type="button" class="btn btn-signIn">Login</button></a></li>
                            <!---<li><a href="{{ route('register') }}">Register</a></li> -->
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu white-text" role="menu">
                                    <li>
                                        <a class='white-text' href="{{ route('home') }}">
                                            Dashboard
                                        </a>

                                    </li>
                                    <li>
                                        <a class='white-text' href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="">
            @yield('content')
        </div>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
