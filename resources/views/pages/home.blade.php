@extends('layouts.app')

@section('content')
    <div class="container-fluid gtco-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>
                        Welcome to <span> MuMarketplace</span> </h1>
                    <p>Discover the MuMarketplace - your go-to destination for all your shopping needs. Whether you're
                        searching for products or looking to sell your own, our platform connects you with buyers and
                        sellers seamlessly. Experience the convenience of finding everything you need in one centralized
                        location. </p>
                    <a href="#contact">Get Your Item <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div>
                <div class="col-md-6">
                    <div class="card"><img class="card-img-top img-fluid" src="{{ asset('front/images/banner-img.png') }}"
                            alt=""></div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('styles')
    <style>
        @media (max-width: 768px) {
            .learning-card {
                padding: 0.65rem;
            }

            .learn-lext {
                font-size: 4px;
            }
        }
    </style>
@endpush
