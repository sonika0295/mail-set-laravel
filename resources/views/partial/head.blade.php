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

    <title>MuMarketplace </title>
    <style>
        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu .dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -1px;
        }

        .dropdown-submenu:hover .dropdown-menu {
            display: block;
        }

        .dropdown-submenu:hover .dropdown-toggle::after {
            transform: rotate(-90deg);
        }

        .dropdown-menu {
            margin-top: 0;
            border: none;
        }

        .dropdown-divider {
            margin: 0;
        }

        .dropdown-item:hover,
        .dropdown-item:focus {
            color: #fff !important;
            background: linear-gradient(to right, #1d3ede, #01e6f8);
        }
    </style>
    @stack('styles')
</head>
