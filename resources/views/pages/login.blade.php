@extends('layouts.app')


@section('content')
    <div id="signin" class="content-section">
        <h2>Sign In</h2>

        @if (session('error'))
            <div class="form-group">
                <div class="error-message">
                    {{ session('error') }}
                </div>
            </div>
        @endif


        <form id="signInForm" action="{{ route('login.submit') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="emailSignIn">Email:</label>
                <input type="email" id="emailSignIn" name="email" value="{{ old('email') }}" required />

                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>
            <div class="form-group">
                <label for="passwordSignIn">Password:</label>
                <input type="password" id="passwordSignIn" name="password" required />

                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <input type="submit" value="Sign In" />
            </div>
        </form>
    </div>
@endsection
