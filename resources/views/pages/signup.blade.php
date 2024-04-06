@extends('layouts.app')


@section('content')
    <div id="signup" class="content-section">
        <h2>Sign Up</h2>

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

        <form id="signUpForm" action="{{ route('signup.submit') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="emailSignUp">Email:</label>
                <input type="email" id="emailSignUp" name="email" value="{{ old('email') }}" required />

                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="passwordSignUp">Password:</label>
                <input type="password" id="passwordSignUp" name="password" required />
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="nameSignUp">Name:</label>
                <input type="text" id="nameSignUp" name="name" value="{{ old('name') }}" required />
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="phoneSignUp">Phone Number:</label>
                <input type="text" id="phoneSignUp" name="phone_number" value="{{ old('phone_number') }}" required />
                @error('phone_number')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="cardSignUp">Card Information:</label>
                <input type="text" id="cardSignUp" name="card_information" value="{{ old('card_information') }}"
                    required />
                @error('card_information')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="addressSignUp">Address:</label>
                <input type="text" id="addressSignUp" name="address" value="{{ old('address') }}" required />
                @error('address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <input type="submit" value="Sign Up" />
            </div>
        </form>

    </div>
@endsection
