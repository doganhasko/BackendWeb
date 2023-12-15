

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
    <section class="page-section cta">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="cta-inner bg-faded text-center rounded">
                        <h2 class="section-heading mb-5">
                            <span class="section-heading-upper">Come On In</span>
                            <span class="section-heading-lower">We're Open</span>
                        </h2>
                        <ul class="list-unstyled list-hours mb-5 text-left mx-auto">
                            <li class="list-unstyled-item list-hours-item d-flex">
                                Sunday
                                <span class="ms-auto">WE ARE AT CHURCH SORRY</span>
                            </li>
                            <li class="list-unstyled-item list-hours-item d-flex">
                                Monday
                                <span class="ms-auto">7:00 AM to 8:00 PM</span>
                            </li>
                            <li class="list-unstyled-item list-hours-item d-flex">
                                Tuesday
                                <span class="ms-auto">7:00 AM to 8:00 PM</span>
                            </li>
                            <li class="list-unstyled-item list-hours-item d-flex">
                                Wednesday
                                <span class="ms-auto">7:00 AM to 8:00 PM</span>
                            </li>
                            <li class="list-unstyled-item list-hours-item d-flex">
                                Thursday
                                <span class="ms-auto">7:00 AM to 8:00 PM</span>
                            </li>
                            <li class="list-unstyled-item list-hours-item d-flex">
                                Friday
                                <span class="ms-auto">7:00 AM to 8:00 PM</span>
                            </li>
                            <li class="list-unstyled-item list-hours-item d-flex">
                                Saturday
                                <span class="ms-auto">9:00 AM to 5:00 PM</span>
                            </li>
                        </ul>
                        <p class="address mb-5">
                            <em>
                                <strong>Quai de l'Industrie 170t</strong>
                                <br />
                                1070 Anderlecht
                            </em>
                        </p>
                        <p class="mb-0">
                            <small><em>Call Anytime</em></small>
                            <br />
                            +485378155
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="page-section about-heading">
        <div class="container">
            <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="{{ asset('/assets/imgs/about.jpg') }}" alt="..." />
            <div class="about-heading-content">
                <div class="row">
                    <div class="col-xl-9 col-lg-10 mx-auto">
                        <div class="bg-faded rounded p-5">
                            <h2 class="section-heading mb-4">
                                <span class="section-heading-upper">Strong Coffee, Strong Roots</span>
                                <span class="section-heading-lower">About Our Cafe</span>
                            </h2>
                            <p>Founded in 2023 by the Dogan Hasko brothers, our establishment has been serving up rich coffee sourced from artisan farmers in various regions of Brussels and Limburg Belgium. We are dedicated to travelling the world, finding the best coffee, and bringing back to you here in our cafe.</p>
                            <p class="mb-0">
                                We guarantee that you will fall in
                                <em>lust</em>
                                with our decadent blends the moment you walk inside until you finish your last sip. Join us for your daily routine, an outing with friends, or simply just to enjoy some alone time.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>