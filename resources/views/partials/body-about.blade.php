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
                        <p>Git Link= https://github.com/doganhasko/BackendWeb<br>The Backend of this assignment is prepared by mostly using the class material of <strong> Kevin Felix</strong>. <br> Some frontend layouts used from https://startbootstrap.com/ and for admin panel https://open-admin.org/docs. I have 2 different table for Admins and Users. This is why you have to Login from admins login page, from users login page you cannot login as admin. But I also used is_admin column in my users table. OpenAdmin gives you chance to edit your database in their dashboard. <br> Also when I got stuck ofcourse I asked help of ChatGpt and Claude. But they were not that helpful.
                        <br>Obviously I didn't just use bootstrap of startbootstrap.com , I modified them as I wished.</p>
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>