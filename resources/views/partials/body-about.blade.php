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
                            <span class="section-heading-upper">PROJECT EXPLANATION</span>
                            <span class="section-heading-lower">About PROJECT</span>
                        </h2>
                        <p>Git Link= https://github.com/doganhasko/BackendWeb<br>The Backend of this assignment is prepared by mostly using the class material of <strong> Kevin Felix</strong>. <br> Some frontend layouts used from https://startbootstrap.com/ . I have created admins with is_admin variable in the users table. But I also used separately an admin panel and configured it like i wanted= https://open-admin.org/docs. OpenAdmin has apart table for it's admins. So I have 2 different table for OpenAdmin and Users(including is_admin variable). To go to OpenAdmin's Login panel; there is a button in User Login page. OpenAdmin login page did not offer chance to edit it and integrate with my User Login page, this is why I built it like this. OpenAdmin gives you chance to edit your database in their dashboard. <br> Also when I got stuck ofcourse I asked help of ChatGpt and Claude. But they were not that helpful.
                        <br>Obviously I didn't just use the bootstrap, I modified them as I wished. <br><strong>Sources= <br>https://startbootstrap.com/ <br>https://open-admin.org/ <br> EHB BackendWeb Courses <br>https://www.youtube.com/watch?v=MYyJ4PuL4pY&ab_channel=TraversyMedia <br>https://www.youtube.com/watch?v=2bz5eleBj98&ab_channel=LaravelDaily </strong>
                        <br><br>I put a lot of time and effort into this project, thats why I learned a lot too.</p>
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>