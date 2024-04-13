@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid gtco-news" id="news">
            <div class="container">

                <h2>Sell Item Update</h2>

                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('sell.update') }}" method="post" style="box-shadow:0 0 10px  lightgrey" class="p-4"
                    enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $item->id }}" required>

                    <div class="from-group  row  mt-3">
                        <div class="col-6">
                            <label class="control-label" for="category">Category:</label>

                            <select required name="category" id="category" class="form-control">
                                <option value="" disabled selected>
                                    All Categories</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $item->category == $category->id ? 'selected' : '' }}>{{ $category->name }}
                                    </option>
                                @endforeach
                            </select>

                            @if ($errors->has('category'))
                                <span class="invalid-feedbackk" role="alert">
                                    <strong>{{ $errors->first('category') }}</strong>
                                </span>
                            @endif

                        </div>
                        <div class="col-6">
                            <label class="control-label" for="name">Item Name:</label>

                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Item Name...." value="{{ $item->name }}" required>

                            @if ($errors->has('name'))
                                <span class="invalid-feedbackk" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif

                        </div>
                    </div>


                    <div class="from-group  row  mt-3">
                        <div class="col-6">
                            <label class="control-label" for="price">Price (Rs): </label>

                            <input type="text" name="price" id="price" class="form-control" placeholder="Price...."
                                value="{{ $item->price }}" required>

                            @if ($errors->has('price'))
                                <span class="invalid-feedbackk" role="alert">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                            @endif

                        </div>
                        <div class="col-6">
                            <label class="control-label" for="price">Image: </label>
                            <input type="file" name="image" class="form-control" accept="image/jpeg, image/png">



                            @if ($errors->has('image'))
                                <span class="invalid-feedbackk" role="alert">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                            @endif
                        </div>

                    </div>

                    <div class="from-group  row mt-4">

                        <div class="col-8">
                            <label class="control-label" for="desc">Description:</label>

                            <textarea class="form-control" cols="40" id="desc" name="desc" placeholder="Description..*" required=""
                                rows="5">{{ $item->description }}</textarea>


                            @if ($errors->has('desc'))
                                <span class="invalid-feedbackk" role="alert">
                                    <strong>{{ $errors->first('desc') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-4">

                            <img src="{{ asset($item->image) }}" alt="" style="height: 200px;width:260px;">


                        </div>
                    </div>

                    <div class="from-group  row mt-4">
                        <div class="col-4">
                            <button type="submit" class="btn  w-100"
                                style="background-image:-webkit-linear-gradient(0deg, #06c6f9 0%, #38eaf9 100%)">
                                Submit</button>
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
