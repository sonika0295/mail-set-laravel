@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid gtco-news" id="news">
            <div class="container">
                <h2>Check requests listed</h2>

                <form action="#" method="GET" style="box-shadow:0 0 10px  lightgrey" class="p-4">


                    <h5 class="mt-0 mb-20 text-green">Remove requests available for sell and list the ones you have that are not available</h5>

                    <div class="from-group  row mt-4">
                       
                        <div class="col-4">
                            <button type="submit" class="btn  w-100"> Upload New Request</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .assignmt-img {
            width: 365px !important;
            height: 264px !important;
        }

        @media (max-width: 768px) {

            .assignmt-img {
                width: unset !important;
            }

        }

        .not-found {
            text-align: center;
        }
    </style>
@endpush
