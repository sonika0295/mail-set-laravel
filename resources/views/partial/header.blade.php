@php
// Check if the user is logged in
if (session()->has('user_info')) {
    // Retrieve user information from session variables
    $userInfo = session('user_info');
    $name = $userInfo['name'];
    // Get the first letter of the user's name
    $initials = strtoupper(substr($name, 0, 1));
} else {
    // If user is not logged in, set initials to empty string
    $initials = '';
}
@endphp

<div class="navbar">
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('buy') }}">Buy</a>
    <a href="{{ route('sell') }}">Sell</a>
    <a href="{{ route('get_request') }}">Request</a>
    <a href="{{ route('setting') }}">Settings</a>

    <div class="dropdown">
        <button class="dropbtn">Accounts</button>
        <div class="dropdown-content">
            @if (session()->has('user_info'))
                <a href="{{ route('logout') }}">Logout</a>
            @else
                <a href="{{ route('login') }}">Sign In</a>
                <a href="{{ route('signup') }}">Register</a>
            @endif
        </div>
    </div>

    @if (session()->has('user_info'))
        <span class="user-initials">{{ $initials }}</span>
    @endif
</div>
