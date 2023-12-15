<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        .navbar-brand:hover {
            color: pink; 
        }

            /* Add padding to the container for left and right spacing */

    </style>
</head>

<header>
    <h1 class="site-heading text-center text-faded d-none d-lg-block">
        <span class="site-heading-lower">Foam It Up Coffee Shop</span>
        <span class="site-heading-upper text-primary mb-3"></span>

    </h1>
</header>

<body >

    
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark py-lg-4"id="mainNav">
            <div class="container">
                <nav >
                    <div class="container">
                        <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="index.html">Start Bootstrap</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/">Reviews</a></li>
                                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="{{ route('about') }}">About</a></li>
                                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="{{ route('products') }}">Products</a></li>
                                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="{{ route('store') }}">Store</a></li>
                                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="{{ route('faq.index') }}">Frequently Asked Questions</a></li>
                                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="{{ route('contact.show') }}">Contact to Admin</a></li>

            
                            </ul>
                            @auth
                            <a class="navbar-brand" href="{{route('posts.create')}}"> Share Experience</a>
                            @endauth
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <!-- Left Side Of Navbar -->
                                <ul class="navbar-nav me-auto">
            
                                </ul>
            
                                <!-- Right Side Of Navbar -->
                                <ul class="navbar-nav ms-auto">
                                    <!-- Authentication Links -->
                                    @guest
                                        @if (Route::has('login'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                                            </li>
                                        @endif
            
                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('register') }}">{{ __('REGISTER') }}</a>
                                            </li>
                                        @endif
                                    @else
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }}
                                            </a>
            
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('profile', ['name' => Auth::user()->name]) }}">My Profile</a>                                                
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>
            
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    @endguest
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>


                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>


            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>


<footer class="footer text-faded text-center py-5">
    <div class="container"><p class="m-0 small">Copyright &copy; DOGAN HASKO 2023</p></div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{ asset('/assets/js/scripts.js') }}"></script>
</body>
</html>
