@extends('layouts.master')
@section('title')
Register
@endsection

@section('head')

@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Register</h1>

            Already have an account? <a href='/login'>Login here...</a>

            <form method='POST' action='{{ route('register') }}'>
                {{ csrf_field() }}

                <label for='first_name'>First Name</label>
                <input id='first_name' type='text' name='first_name' value='{{ old('first_name') }}' required autofocus>
                @include('includes.error-field', ['fieldName' => 'first_name'])

                <label for='first_name'>Last Name</label>
                <input id='first_name' type='text' name='last_name' value='{{ old('last_name') }}' required>
                @include('includes.error-field', ['fieldName' => 'last_name'])

                <label for='email'>E-Mail Address</label>
                <input id='email' type='email' name='email' value='{{ old('email') }}' required>
                @include('includes.error-field', ['fieldName' => 'email'])

                <label for='uid'>User UD</label>
                <input id='uid' type='text' name='uid' value='{{ old('uid') }}' required>
                @include('includes.error-field', ['fieldName' => 'uid'])

                <label for='password'>Password (min: 8)</label>
                <input id='password' type='password' name='password' required>
                @include('includes.error-field', ['fieldName' => 'password'])

                <label for='password-confirm'>Confirm Password</label>
                <input id='password-confirm' type='password' name='password_confirmation' required>

                <button type='submit' class='btn btn-primary'>Register</button>
            </form>
        </div>
    </div>
</div>
@endsection

{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm"
                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>
@endsection --}}