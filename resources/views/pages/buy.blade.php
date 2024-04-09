@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid gtco-news" id="news">
            <div class="container">
                <h2>Browse Items</h2>

                <form action="#" method="GET" style="box-shadow:0 0 10px  lightgrey" class="p-4">
                    <div class="from-group  row">
                        <div class="col-8">
                            <input type="text" name="search" class="form-control" placeholder="Search for items..."
                                value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}">
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn  w-100"> Search</button>
                        </div>
                    </div>

                    <div class="from-group  row  mt-3">
                        <div class="col-12">
                            <label class="control-label" for="name">Category:</label>

                            <select required name="status" id="" class="form-control">
                                <option value="1">
                                    All Categories</option>
                                <option value="0">
                                    Books</option>
                                <option value="0">
                                    Electronics</option>
                                <option value="0">
                                    Clothing</option>
                                <option value="0">
                                    Furniture</option>
                                <option value="0">
                                    Other</option>
                            </select>
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
