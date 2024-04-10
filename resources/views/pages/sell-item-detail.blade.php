@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid gtco-news" id="news">
            <div class="container">
                <h2> {{ $data->name }} </h2>

                <div class="content-wrapper">
                    <div class="content-image">
                        <img class="card-img-top assignmt-img" src="{{ asset($data->image) }}" alt="">
                    </div>
                    <div class="content-description">

                        <div class="content-description-text">
                            <div class="info-line">
                                <p class="info-item">Price: {{ $data->price }} Rs</p>
                                <p class="info-item">Category: {{ $data->CategoryName->name }}</p>
                            </div>
                            <p class="description">{!! $data->description !!}</p>
                        </div>

                    </div>
                </div>


                <div class="container-fluid gtco-news" id="news">
                    <div class="container">
                        <h2> Latest Items </h2>
                        <div class="owl-carousel owl-carousel2 owl-theme">
                            @foreach ($latest as $item)
                                <div>
                                    <div class="card text-center"><img class="card-img-top lat-assign-img"
                                            src="{{ asset($item->image) }}" alt="">
                                        <div class="card-body text-left pr-0 pl-0">
                                            <h5 class="three-dot"> {{ $item->name }} </h5>

                                            <div class="info-line">
                                                <p class="info-item">Price: {{ $item->price }} Rs</p>
                                                <p class="info-item">Category: {{ $item->CategoryName->name }}</p>
                                            </div>

                                            <a href="{{ route('item.detail', ['slug' => $item->slug]) }}">READ
                                                MORE <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .assignmt-img {
            height: 50%;
            width: 50%;
        }

        .content-description {
            flex: 1;
        }

        .lat-assign-img {
            height: 236px !important;
            width: 330px !important;
        }

        .content-image {
            text-align: center;
        }

        .additional-details {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .additional-details h5 {
            margin-top: 0;
            margin-bottom: 15px;
            text-align: center;
        }

        .additional-details ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .additional-details li {
            margin-bottom: 10px;
            font-size: 16px;
            line-height: 1.5;
            display: inline-block;
            padding: 0px 10px;
        }

        .additional-details li strong {
            margin-right: 10px;
            /* Add spacing between label and value */
        }

        .content-description {
            flex: 1;
        }

        .content-description-text {
            margin-top: 20px;
            /* Add spacing between additional details and description */
        }

        .additional-details a {
            color: #007bff;
            text-decoration: none;
        }

        .additional-details a:hover {
            text-decoration: underline;
        }

        .content-description-text {
            /* Your styles for the container */
        }

        .info-line {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin-bottom: 10px;
            /* Adjust margin as needed */
        }

        .info-item {
            margin-right: 20px;
            /* Adjust margin between items */
        }

        .description {
            /* Your styles for the description */
        }

        .gtco-news .owl-carousel .card p {
            font-size: 15px;
        }
    </style>
@endpush
