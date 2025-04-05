@include('layouts.guest.partial.head')

<body>

    <button onclick="topFunction()" id="backTop" title="Go to top"><i class="fa fa-arrow-up"></i></button>
    <div id="loading">
        <div class="d-flex flex-column justify-content-center align-items-center text-success vh-100">
            <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
            <span class="sr-only">Loading...</span>
        </div>

    </div>


    @include('layouts.guest.partial.nav-bar')

    @yield('content')
    <!-- footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="mb-4 col-12 col-md-6 col-lg-4">
                    <div class="footer-wrapper">
                        <h3>About Us</h3>
                        <p>UR Community Hub is a platform designed to connect students, faculty, and alumni, fostering
                            collaboration, knowledge sharing, and community engagement.</p>
                    </div>
                </div>
                <div class="mb-4 col-12 col-md-6 col-lg-4">
                    <div class="footer-wrapper">
                        <h3>Quick Links</h3>
                        <ul>
                            <li>
                                <a href="{{ route('home') }}#about-us">Home</a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route('home') }}#community">Community</a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route('home') }}#community-events">Event</a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route('TermAndCondition') }}">Terms And Condition</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mb-4 col-12 col-md-6 col-lg-4">
                    <div class="footer-wrapper">
                        <h3>Contact Us</h3>
                        <ul>
                            <li>
                                <a href="#">
                                    <p>Office Address</p>
                                    University of Rwanda, Kigali
                                </a><br>
                                <a href="tel:+250781065367">
                                    <i class="fa fa-phone"></i> +25078xxxxxxx
                                </a><br>
                                <a href="mailto:info@urcommunityhub.com">
                                    <i class="fa fa-envelope"></i> info@urcommunityhub.com
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="footer-bottom">
                        <p>© {{ date('Y') }} UR Community Hub, All Rights Reserved.</p>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-google"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    @include('layouts.guest.partial.foot')
