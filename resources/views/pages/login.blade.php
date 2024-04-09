@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid gtco-news" id="news">
            <div class="container">
                <h2>Sign In</h2>

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

                <form action="{{ route('login.submit') }}" method="post" style="box-shadow:0 0 10px  lightgrey"
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



                    <div class="from-group  row mt-4">

                        <div class="col-4">
                            <button style="background-image:-webkit-linear-gradient(0deg, #06c6f9 0%, #38eaf9 100%)"
                                class="submit-button btn btn-primary text-white btn-lg btn-circled"
                                type="submit">Sign In</button>
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
