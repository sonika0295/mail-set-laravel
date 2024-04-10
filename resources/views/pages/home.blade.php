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
            <h2>Selling Items</h2>

            <form action="{{ route('data', 'assignment') }}" method="GET" style="box-shadow:0 0 10px  lightgrey"
                class="p-4">
                <div class="from-group  row">
                    @php
                        $categories = App\Models\Category::whereStatus('1')->get();

                        $category_id = request()->query('category_id');

                    @endphp


                    <div class="col-3">
                        <select name="category_id" id="category_id" class="form-control">
                            @if ($categories->isEmpty())
                                <option value="" disabled>No categories available</option>
                            @else
                                <option value="" {{ $category_id == null ? 'selected' : '' }}>All Category
                                </option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>


                    <div class="col-7">
                        <input type="text" name="search" class="form-control" placeholder="Search Items here"
                            value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}">
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn  w-100"> Search</button>
                    </div>
                </div>
            </form>

            @if ($data->isEmpty())
                <div class="row mt-4">
                    <div class="col-12 not-found">
                        <p>No assignments found.</p>
                    </div>
                </div>
            @else
                <div class="row mt-4">
                    @foreach ($data as $item)
                        <div class="col-sm-4 col-12">
                            <div>
                                <div class="card text-center"><img class="card-img-top sell-item-img"
                                        src="{{ asset($item->image) }}" alt="">
                                    <div class="card-body text-left pr-0 pl-0">
                                        <h5 class="three-dot font-weight-bold">{{ $item->name }}</h5>
                                        <div class="info-line">
                                            <p class="info-item">Price: {{ $item->price }} Rs</p>
                                            <p class="info-item">Category: {{ $item->CategoryName->name }}</p>
                                        </div>

                                        <a href="{{ route('item.detail', ['slug' => $item->slug]) }}">READ
                                            MORE <i class="fa fa-angle-right" aria-hidden="true"></i></a>
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

        .info-line p {
            font-size: 16px;
        }
    </style>
@endpush
