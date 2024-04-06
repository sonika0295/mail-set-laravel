@extends('layouts.app')


@section('content')
    <div id="signup" class="content-section">
        <h2>Email Verification </h2>

        @if (session('success'))
            <div class="alert alert-success success-message">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger error-message">
                {{ session('error') }}
            </div>
        @endif

        <form id="signUpForm" action="{{ route('email.verify') }}" method="POST">
            @csrf

            <input type="hidden" id="userIdInput" name="user_id" value="{{ encrypt($user->id) }}">

            <div class="form-group">
                <label for="emailCode">Enter Code Here:</label>
                <input type="text" id="emailCode" name="verification_code" value="{{ old('verification_code') }}"
                    required />
                @error('verification_code')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group resend">
                <a href="javascript:void(0)" id="resendCode">Resend Code</a>
            </div>
            <div class="form-group">
                <input type="submit" value="Verify" />
            </div>

        </form>

    </div>
@endsection

@push('styles')
    <style>
        .resend {
            text-align: right;
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
