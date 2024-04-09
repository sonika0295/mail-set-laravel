@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid gtco-news" id="news">
            <div class="container">
                <h2>Email Verification</h2>

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

                <form action="{{ route('email.verify') }}" method="POST" style="box-shadow:0 0 10px  lightgrey"
                    class="p-4">
                    @csrf
                    <input type="hidden" id="userIdInput" name="user_id" value="{{ encrypt($user->id) }}">
                    <div class="from-group  row mt-4">
                        <div class="col-8">
                            <label class="control-label" for="name">Enter Code Here:</label>
                            <input type="text" name="verification_code" value="{{ old('verification_code') }}"
                                class="form-control" placeholder="Verification Code...." required>

                            @if ($errors->has('verification_code'))
                                <span class="invalid-feedbackk" role="alert">
                                    <strong>{{ $errors->first('verification_code') }}</strong>
                                </span>
                            @endif

                        </div>
                        <div class="col-4">
                            <label class="control-label" for="name">Resend from Code Here:</label>
                            <button class="btn  w-100"> <a href="javascript:void(0)" id="resendCode">Resend
                                    Code</a></button>
                        </div>
                    </div>



                    <div class="from-group  row mt-4">

                        <div class="col-2">
                            <button style="background-image:-webkit-linear-gradient(0deg, #06c6f9 0%, #38eaf9 100%)"
                                class="submit-button btn btn-primary text-white btn-lg btn-circled"
                                type="submit">Verify</button>
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


@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#resendCode').click(function(e) {
                e.preventDefault();

                $.ajax({
                    url: `{{ route('email.resend') }}`,
                    type: 'POST',
                    data: {
                        user_id: '{{ encrypt($user->id) }}',
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        alert('Code resent successfully.');
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        alert('Failed to resend code. Please try again.');
                    }
                });
            });
        });
    </script>
@endpush
