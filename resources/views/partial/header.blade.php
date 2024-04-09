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
                <li class="nav-item"><a class="nav-link" href="{{ route('index') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('assignment') }}">Buy</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('course') }}">Sell</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">Request</a></li>
                <li class="nav-item"><a class="nav-link setting" href="{{ route('about') }}">Settings</a></li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <div class="dropdown">
                    <a href="#" class="btn btn-outline-dark my-2 my-sm-0 mr-3 text-uppercase dropdown-toggle" id="accountDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account</a>
                    <div class="dropdown-menu" aria-labelledby="accountDropdown">
                        <a class="dropdown-item" href="#signup">Signup</a>
                        <a class="dropdown-item" href="#login">Login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</nav>

<script>
    // Function to toggle dropdown menu visibility
    function toggleDropdown() {
        var dropdownMenu = document.querySelector('.dropdown-menu');
        dropdownMenu.classList.toggle('show');
    }

    // Close dropdown menu when clicking outside
    window.onclick = function(event) {
        if (!event.target.matches('.dropdown-toggle')) {
            var dropdowns = document.getElementsByClassName("dropdown-menu");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>
