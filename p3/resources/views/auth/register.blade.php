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
            <h1 dusk="register-heading">Register</h1>

            Already have an account? <a href='/login'>Login here...</a>

            <form method='POST' action='{{ route('register') }}'>
                {{ csrf_field() }}

                <label for='first_name'>First Name</label>
                <input dusk='first-name-input' id='first_name' type='text' name='first_name'
                    value='{{ old('first_name') }}' required autofocus>
                @include('includes.error-field', ['fieldName' => 'first_name'])

                <label for='first_name'>Last Name</label>
                <input dusk='last-name-input' id='last_name' type='text' name='last_name' value='{{ old('last_name') }}'
                    required>
                @include('includes.error-field', ['fieldName' => 'last_name'])

                <label for='email'>E-Mail Address</label>
                <input dusk='email-input' id='email' type='email' name='email' value='{{ old('email') }}' required>
                @include('includes.error-field', ['fieldName' => 'email'])

                <label for='uid'>User UD</label>
                <input dusk='uid-input' id='uid' type='text' name='uid' value='{{ old('uid') }}' required>
                @include('includes.error-field', ['fieldName' => 'uid'])

                <label for='password'>Password (min: 8)</label>
                <input dusk='password-input' id='password' type='password' name='password' required>
                @include('includes.error-field', ['fieldName' => 'password'])

                <label for='password-confirm'>Confirm Password</label>
                <input dusk='password-confirm-input' id='password-confirm' type='password' name='password_confirmation'
                    required>

                <button dusk='register-button' type='submit' class='btn btn-primary'>Register</button>
            </form>
        </div>
    </div>
</div>
@endsection