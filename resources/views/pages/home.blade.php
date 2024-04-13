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


    <div class="container-fluid gtco-news">
        <div class="container">
            <form action="{{ route('home') }}" method="GET" style="box-shadow:0 0 10px  lightgrey" class="p-3">

                <h2>Selling Items</h2>

                <div class="from-group row">
                    <div class="col-md-10 col-sm-8">
                        <input type="text" name="search" class="form-control" placeholder="Search Items here"
                            value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}">
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <button type="submit" class="btn w-100">Search</button>
                    </div>
                </div>


                <div class="row  mt-4">
                    <div class="col-md-3">

                        <h4>Filter</h4>
                        @php
                            $categories = App\Models\Category::whereStatus('1')->get();
                            $catid = request()->query('catid');
                            $min_p = request()->query('min_p');
                            $max_p = request()->query('max_p');
                            $sdate = request()->query('sdate');
                            $edate = request()->query('edate');
                        @endphp
                        <div class="form-group">
                            <label for="catid">Category:</label>
                            <select name="catid" id="catid" class="form-control">
                                @if ($categories->isEmpty())
                                    <option value="" disabled>No categories available</option>
                                @else
                                    <option value="" {{ $catid == null ? 'selected' : '' }}>All Category
                                    </option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $catid == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="price_range">Price Range:</label>
                            <div class="row">
                                <div class="col-6">
                                    <input type="number" class="form-control" name="min_p" placeholder="Min"
                                        value="{{ $min_p }}">
                                </div>
                                <div class="col-6">
                                    <input type="number" class="form-control" name="max_p" placeholder="Max"
                                        value="{{ $max_p }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="date_range">Date Range:</label>
                            <div class="row">
                                <div class="col-6">
                                    <input type="date" class="form-control" name="sdate" value="{{ $sdate }}">
                                </div>
                                <div class="col-6">
                                    <input type="date" class="form-control" name="edate" value="{{ $edate }}">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Apply Filters</button>

                    </div>


                    <!-- Display Items -->
                    <div class="col-md-9">
                        @if ($data->isEmpty())
                            <div class="row mt-4">
                                <div class="col-12 not-found">
                                    <div class="card text-center">
                                        <p>No Items found.</p>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row mt-4">
                                @foreach ($data as $item)
                                    <div class="col-12">
                                        <!-- Item Card -->
                                        <div class="card mb-4">
                                            <div class="row no-gutters">
                                                <!-- Image -->
                                                <div class="col-md-4">
                                                    <img src="{{ asset($item->image) }}" class="card-img item-img"
                                                        alt="Item Image">
                                                </div>
                                                <!-- Item details -->
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <h5 class="card-title three-dot">{{ $item->name }}</h5>
                                                        <p class="card-text">Date :
                                                            {{ $item->created_at->format('d M Y') }}
                                                        </p>
                                                        <div class="price-category-container">
                                                            <p class="price">Price : {{ $item->price }}</p>
                                                            <p class="category">Category : {{ $item->categoryName->name }}
                                                            </p>
                                                        </div>
                                                        <p class="card-text"
                                                            style="overflow: hidden; text-overflow: ellipsis; -webkit-line-clamp: 2; -webkit-box-orient: vertical; display: -webkit-box;">
                                                            {{ $item->description }}</p>

                                                        <a href="{{ route('item.detail', ['slug' => $item->slug]) }}"
                                                            class="btn btn-primary">Read More</a>

                                                        <a href="{{ route('user', $item->user_id) }}"
                                                            class="btn btn-primary"><i class="fa fa-comments"
                                                                aria-hidden="true"></i>
                                                            Chat</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>


                            <!-- Pagination Links -->
                            <div class="row mt-4">
                                <div class="col-12">
                                    {{ $data->links() }}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
        </div>
        </form>
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


        .info-line {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .info-item {
            margin-right: 20px;

        }


        .info-line p {
            font-size: 16px;
        }

        .item-img {
            height: 250px;
            width: 227px;
        }

        .price-category-container {
            display: flex;
            justify-content: space-between;
        }

        .price {
            order: 1;
        }

        .category {
            order: 2;
            text-align: right;
        }
    </style>
@endpush
