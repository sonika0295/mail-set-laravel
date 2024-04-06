@extends('layouts.app')


@section('content')
    <div class="background-container">
        <img src="{{ asset('images/background.png') }}" alt="Background Image" />

        <div class="overlay"></div>
        <div class="content">

            @if (session('success'))
                <div class="alert alert-success success-message" style="text-align: center">
                    {{ session('success') }}
                </div>
            @endif

            <div id="home">

                <h2>Welcome to the MuMarketplace</h2>
                <p>
                    Find everything you need in one place, connect with sellers, or list
                    your own items.
                </p>
                <a href="{{ route('buy') }}"><button type="button">Get your item</button></a>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script src="//code.tidio.co/qdqw4ysnwjjavc0tovkoycadfmanndhw.js" async></script>
    <script src="{{ asset('js/script.js') }}"></script>
@endpush
