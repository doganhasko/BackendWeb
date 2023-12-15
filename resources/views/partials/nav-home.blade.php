<nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
    <nav class="navbar navbar-expand-lg navbar-dark py-lg-4"id="mainNav">
        <div class="container">
            <nav >
                <div class="container">
                    <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="index.html">Start Bootstrap</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/">Reviews</a></li>
                            <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="about">About</a></li>
                            <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="products">Products</a></li>
                            <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="store">Store</a></li>
                            <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="faq">Frequently Asked Questions</a></li>
                            <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="contact">Contact to Admin</a></li>
        
                        </ul>
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
            @auth
            <a class="navbar-brand" href="{{route('posts.create')}}"> Share Experience</a>
            @endauth

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>


        </div>
    </nav>
<section class="page-section clearfix">
    <div class="container">
        <div class="intro">
            <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="{{ asset('/assets/imgs/intro.jpg') }}" alt="..." />
            <div class="intro-text left-0 text-center bg-faded p-5 rounded">
                <h2 class="section-heading mb-4">
                    <span class="section-heading-upper">Fresh Coffee</span>
                    <span class="section-heading-lower">Worth Drinking</span>
                </h2>
                <p class="mb-3">Every cup of our quality artisan coffee starts with locally sourced, hand picked ingredients. Once you try it, our coffee will be a blissful addition to your everyday morning routine - we guarantee it!</p>
                <div class="intro-button mx-auto"><a class="btn btn-primary btn-xl" href="#!">Visit Us Today!</a></div>
            </div>
        </div>
    </div>
</section>
<section class="page-section cta">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <div class="cta-inner bg-faded text-center rounded">
                    <h2 class="section-heading mb-4">
                        <span class="section-heading-upper">Our Promise</span>
                        <span class="section-heading-lower">To You</span>
                    </h2>
                    <p class="mb-0">When you walk into our shop to start your day, we are dedicated to providing you with friendly service, a welcoming atmosphere, and above all else, excellent products made with the highest quality ingredients. If you are not satisfied, please let us know and we will do whatever we can to make things right!</p>
                </div>
            </div>
        </div>
    </div>
</section>