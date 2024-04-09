@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid gtco-news" id="news">
            <div class="container">
                <h2>Settings</h2>

                <form action="#" method="GET" style="box-shadow:0 0 10px  lightgrey" class="p-4">

                    <h4 class="mt-0 mb-20 text-green">Customize your settings</h4>

                    <div class="from-group  row  mt-3">

                        <div class="col-6">
                            <label class="control-label" for="name">Name :</label>

                            <input type="text" name="search" class="form-control" placeholder="Name...."
                                value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}">
                        </div>

                        <div class="col-6">
                            <label class="control-label" for="name">Email:</label>

                            <input type="text" name="search" class="form-control" placeholder="Email...."
                                value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}">
                        </div>
                    </div>


                    <div class="from-group  row  mt-3">
                        <div class="col-6">
                            <label class="control-label" for="name">Phone Number:</label>

                            <input type="text" name="search" class="form-control" placeholder="Phone Number...."
                                value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}">
                        </div>
                        <div class="col-6">
                            <label class="control-label" for="name">Address:</label>

                            <input type="text" name="search" class="form-control" placeholder="Address...."
                                value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}">
                        </div>
                    </div>

                    <div class="from-group  row  mt-3">
                        <div class="col-12">
                            <label class="control-label" for="name">Card Info :</label>

                            <input type="text" name="search" class="form-control" placeholder="Card Info...."
                                value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}">
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
