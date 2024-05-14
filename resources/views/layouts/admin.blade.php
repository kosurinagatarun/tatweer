<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Tatweer">
    <!-- Favicon Icon -->
    <link rel="icon" href="{{ asset('assets/tatweer-img/favicon.webp') }}">
    <!-- Site Title -->
    <title>Tatweer - Design, Development, Marketing</title>
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/lightgallery.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <div class="cs-preloader cs-center">
        <div class="cs-preloader_in"></div>
    </div>
    <!-- Start Header Section -->
    <header class="cs-site_header cs-style1 text-uppercase cs-sticky_header">
        <div class="cs-main_header">
            <div class="container">
                <div class="cs-main_header_in">
                    <div class="cs-main_header_left">
                        <a class="cs-site_branding" href="{{ url('/') }}">
                            <img src="{{ asset('assets/tatweer-img/tatweer_logo.png') }}" alt="Logo">
                        </a>
                    </div>
                    <div class="cs-main_header_center">
                        <div class="cs-nav cs-primary_font cs-medium">
                            <ul class="cs-nav_list">
                                <li>
                                    <a href="{{ url('/') }}">Home</a>
                                </li>
                                <li>
                                    <a href="{{ url('about') }}">About</a>
                                </li>
                                <li class="menu-item-has-children cs-mega_menu">
                                    <a href="#">Services</a>
                                    <ul class="cs-mega_wrapper">
                                        <li>
                                            <ul>
                                                <li>
                                                    <h6>Design</h6>
                                                    <a href="#">UI/UX</a>
                                                    <a href="#">Graphic</a>
                                                    <a href="#">Branding</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <ul>
                                                <li>
                                                    <h6>Development</h6>
                                                    <a href="#">Web Development</a>
                                                    <a href="#">Web Applications</a>
                                                    <a href="#">Mobile Applications</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <ul>
                                                <li>
                                                    <h6>Marketing</h6>
                                                    <a href="#">Search Engine Optimization</a>
                                                    <a href="#">Social Media Marketing</a>
                                                    <a href="#">Digital Marketing</a>
                                                    <a href="#">Lead Generation</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <ul>
                                                <li>
                                                    <h6>Production</h6>
                                                    <a href="#">Media</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <ul>
                                                <li>
                                                    <h6>Planning and Organizing</h6>
                                                    <a href="#">Exhibitions</a>
                                                    <a href="#">Events</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ url('contact') }}">Contact</a>
                                </li>
                            </ul>
                            <a href="{{ url('contact') }}" class="btn let-btn">Let's Talk</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End Header Section -->

    <!-- Add your body content here -->
    <main>

        @yield('content')

    </main>

    <!-- Script -->
    <script src="{{ asset('assets/js/plugins/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/isotope.pkg.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.counter.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/lightgallery.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/gsap.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
