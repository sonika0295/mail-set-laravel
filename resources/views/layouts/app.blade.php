<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- awesone fonts css-->
    <link href="{{ asset('front/css/font-awesome.css') }}" rel="stylesheet" type="text/css">
    <!-- owl carousel css-->
    <link rel="stylesheet" href="{{ asset('front/owl-carousel/assets/owl.carousel.min.css') }}" type="text/css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
    <!-- custom CSS -->
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/custom.css') }}">

    <title>Assignment website </title>
    <style>

    </style>
    @stack('styles')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light bg-transparent" id="gtco-main-nav">
        <div class="container">
            <a class="navbar-brand" href="#">MuMarketplace</a>
            <button class="navbar-toggler" data-target="#my-nav" onclick="myFunction(this)" data-toggle="collapse">
                <span class="bar1"></span>
                <span class="bar2"></span>
                <span class="bar3"></span>
            </button>
            <div id="my-nav" class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('buy') }}">Buy</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('sell') }}">Sell</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('request') }}">Request</a></li>
                    <li class="nav-item"><a class="nav-link setting" href="{{ route('setting') }}">Settings</a></li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <div class="dropdown">
                        <a href="#" class="btn btn-outline-dark my-2 my-sm-0 mr-3 text-uppercase dropdown-toggle"
                            id="accountDropdown" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">Account</a>
                        <div class="dropdown-menu" aria-labelledby="accountDropdown">
                            @if (Auth::check())
                                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                            @else
                                <a class="dropdown-item" href="{{ route('signup') }}">Signup</a>
                                <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                            @endif

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </nav>

    @yield('content')


    <footer class="container-fluid mt-5" id="gtco-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6" id="contact">
                    <h4>Contact Us</h4>
                    <ul class="nav flex-column services-nav">
                        <li class="nav-item"><a class="nav-link" href="#">Email: MuMarketplace@monmouth.edu</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#">Phone: 732-571-3400</a></li>

                    </ul>
                </div>

                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="">Fllow Us</h4>
                            <ul class="nav follow-us-nav">
                                <li class="nav-item"><a class="nav-link pl-0" href="#"><i class="fa fa-facebook"
                                            aria-hidden="true"></i></a></li>
                                <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-twitter"
                                            aria-hidden="true"></i></a></li>
                                <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-google"
                                            aria-hidden="true"></i></a></li>
                                <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-linkedin"
                                            aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <h4>Address</h4>
                            <ul class="nav flex-column services-nav">
                                <li class="nav-item"><a class="nav-link" href="#">123 Street Name</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">City, State ZIP Code</a></li>

                            </ul>
                        </div>
                        <div class="col-12">
                            <p>&copy; {{ date('Y') }}. All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('front/js/jquery-3.3.1.slim.min.js') }}"></script>
    <script src="{{ asset('front/js/popper.min.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
    <!-- owl carousel js-->
    <script src="{{ asset('front/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front/js/main.js') }}"></script>
</body>

</html>


@stack('scripts')
