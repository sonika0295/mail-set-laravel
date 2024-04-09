@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid gtco-news" id="news">
            <div class="container">
                <h2>Sign Up</h2>

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

                <form action="{{ route('signup.submit') }}" method="post" style="box-shadow:0 0 10px  lightgrey"
                    class="p-4">
                    @csrf

                    <div class="from-group  row  mt-3">
                        <div class="col-6">
                            <label class="control-label" for="name">Email:</label>
                            <input type="text" name="email" class="form-control" placeholder="Email...."
                                value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedbackk" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif

                        </div>
                        <div class="col-6">
                            <label class="control-label" for="name">Password:</label>
                            <input type="password" name="password" class="form-control" placeholder="Password...."
                                value="" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedbackk" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="from-group  row  mt-3">
                        <div class="col-6">
                            <label class="control-label" for="name">Name:</label>
                            <input type="text" name="name" class="form-control" placeholder="Name...."
                                value="{{ old('name') }}" required>
                        </div>
                        <div class="col-6">
                            <label class="control-label" for="name">Phone Number:</label>
                            <input type="text" name="phone_number" class="form-control" placeholder="Phone Number...."
                                value="{{ old('phone_number') }}" required>

                            @if ($errors->has('phone_number'))
                                <span class="invalid-feedbackk" role="alert">
                                    <strong>{{ $errors->first('phone_number') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="from-group  row  mt-3">
                        <div class="col-6">
                            <label class="control-label" for="name">Card Information:</label>
                            <input type="text" name="card_information" class="form-control"
                                placeholder="Card Information...." value="{{ old('card_information') }}" required>

                            @if ($errors->has('card_information'))
                                <span class="invalid-feedbackk" role="alert">
                                    <strong>{{ $errors->first('card_information') }}</strong>
                                </span>
                            @endif

                        </div>
                        <div class="col-6">
                            <label class="control-label" for="name">Address:</label>
                            <input type="text" name="address" class="form-control" placeholder="Address...."
                                value="{{ old('address') }}" required>

                            @if ($errors->has('address'))
                                <span class="invalid-feedbackk" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif

                        </div>
                    </div>

                    <div class="from-group  row mt-4">

                        <div class="col-4">
                            <button style="background-image:-webkit-linear-gradient(0deg, #06c6f9 0%, #38eaf9 100%)"
                                class="submit-button btn btn-primary text-white btn-lg btn-circled"
                                type="submit">Submit</button>
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
