    <!-- header -->
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="top-header-wrapper">
                        <div class="top-header-left">
                            {{-- <ul>
                                <li>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-google"></i></a>
                                </li>
                            </ul> --}}
                        </div>
                        <div class="top-header-right">
                            <!-- Clickable Phone Number -->
                            <a href="{{ route('home') }}" class="top-header-contact">
                                <i class="fa fa-home"></i>UR Community Hub
                            </a>

                            <!-- Clickable Email Address -->
                            <a href="mailto:info@ivorybusinessgroup.com" class="px-4 top-header-contact">
                                <i class="fa fa-envelope"></i>info@urcommunityhub.com
                            </a>

                            @auth
                                <a href="{{ route('dashboard') }}" class="top-header-btn">
                                    <span class="material-icons"></span>Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="top-header-btn">
                                    <span class="material-icons"></span>Login
                                </a>
                            @endauth

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="header" id="myHeader">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="logo">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img class="img-fluid" src="{{ asset('assets/images/logo/logo.png') }}" alt="img">
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="my-2 navbar-nav ms-auto my-lg-0 navbar-nav-scroll">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}#community">Community</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}#community-events">Event</a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ route('TermAndCondition') }}">Terms And Condition</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}#contact-us">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
