<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- title of site -->
    <title>Furniture</title>
    <!--font-family-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <!-- For favicon png -->
    <link rel="shortcut icon" type="image/icon" href="{{ asset('logo/favicon.png') }}" />
    <!--font-awesome.min.css-->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <!--linear icon css-->
    <link rel="stylesheet" href="{{ asset('css/linearicons.css') }}">
    <!--animate.css-->
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <!--owl.carousel.css-->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <!--bootstrap.min.css-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- bootsnav -->
    <link rel="stylesheet" href="{{ asset('css/bootsnav.css') }}">
    <!--style.css-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!--responsive.css-->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="{{ asset('//fonts.gstatic.com') }}">
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Nunito') }}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h5>SEO-ERA</h5>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li>
                            <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }}</a>
                        </li>
                        @endforeach
                        <li>
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @if( Auth::check() && Auth::user()->is_admin == 1 )
        <div class="sidebar">
            <a class="active" href="{{ route('home') }}">Home</a>
            <a href="{{ route('users.index') }}">users</a>
            <a href="{{ route('products.index') }}">Products</a>
        </div>
        <style>
            /* The side navigation menu */
            .sidebar {
                margin: 0;
                padding: 0;
                width: 200px;
                background-color: #f1f1f1;
                position: fixed;
                height: 100%;
                overflow: auto;
            }

            /* Sidebar links */
            .sidebar a {
                display: block;
                color: black;
                padding: 16px;
                text-decoration: none;
            }

            /* Active/current link */
            .sidebar a.active {
                background-color: #4CAF50;
                color: white;
            }

            /* Links on mouse-over */
            .sidebar a:hover:not(.active) {
                background-color: #555;
                color: white;
            }

            /* Page content. The value of the margin-left property should match the value of the sidebar's width property */
            div.content {
                margin-left: 200px;
                padding: 1px 16px;
                height: 1000px;
            }

            /* On screens that are less than 700px wide, make the sidebar into a topbar */
            @media screen and (max-width: 700px) {
                .sidebar {
                    width: 100%;
                    height: auto;
                    position: relative;
                }

                .sidebar a {
                    float: left;
                }

                div.content {
                    margin-left: 0;
                }
            }

            /* On screens that are less than 400px, display the bar vertically, instead of horizontally */
            @media screen and (max-width: 400px) {
                .sidebar a {
                    text-align: center;
                    float: none;
                }
            }
        </style>
        @endif


        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!--footer start-->
    <footer id="footer" class="footer">
        <div class="container">
            <div class="hm-footer-copyright text-center">
                <div class="footer-social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                    <a href="#"><i class="fa fa-behance"></i></a>
                </div>
                <p>
                    &copy;copyright. 2020 SEO-ERA - All Rights Reserved.
                </p>
                <!--/p-->
            </div>
            <!--/.text-center-->
        </div>
        <!--/.container-->

        <div id="scroll-Top">
            <div class="return-to-top">
                <i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
            </div>

        </div>
        <!--/.scroll-Top-->

    </footer>
    <!--/.footer-->
    <!--footer end-->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <!--modernizr.min.js-->
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js') }}"></script>
    <!--bootstrap.min.js-->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- bootsnav js -->
    <script src="{{ asset('js/bootsnav.js') }}"></script>
    <!--owl.carousel.js-->
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js') }}"></script>
    <!--Custom JS-->
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>