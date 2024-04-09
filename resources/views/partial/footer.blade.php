<footer class="container-fluid mt-5" id="gtco-footer">
    <div class="container">
        <div class="row">


            <div class="col-lg-4">
                <h4>Contact Us</h4>
                <ul class="nav flex-column services-nav">
                    <li class="nav-item"><a class="nav-link" href="#">Email: MuMarketplace@monmouth.edu</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#">Phone: 732-571-3400</a></li>
                </ul>
            </div>

            <div class="col-lg-4">

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
            <div class="col-lg-4">
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
</footer>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('front/js/jquery-3.3.1.slim.min.js') }}"></script>
<script src="{{ asset('front/js/popper.min.js') }}"></script>
<script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
<!-- owl carousel js-->
<script src="{{ asset('front/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('front/js/main.js') }}"></script>
<script>
    // Toggle dropdowns on click for touch devices
    $(document).ready(function() {
        $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
            var $el = $(this).next('.dropdown-menu');
            if ($el.hasClass('show')) {
                $el.removeClass('show');
            } else {
                $(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
                $el.addClass('show');
            }
            $(this).closest('li.nav-item.dropdown').toggleClass('show');
            return false;
        });

        // Close dropdowns when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.dropdown').length) {
                $('.dropdown-menu').removeClass('show');
            }
        });

        // Close subcategories when clicking on the same category heading
        $('.dropdown-menu').on('click', function(e) {
            if ($(e.target).hasClass('dropdown-toggle')) {
                var $submenu = $(e.target).next('.dropdown-menu');
                if ($submenu.hasClass('show')) {
                    $submenu.removeClass('show');
                } else {
                    $(this).find('.dropdown-menu').removeClass('show');
                    $submenu.addClass('show');
                }
            }
        });
    });
</script>
