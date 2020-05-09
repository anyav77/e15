@extends('layouts.master')

@section('content')

<h1>Login</h1>

Don’t have an account? <a href='/register'>Register here...</a>

<form method='POST' action='{{ route('login') }}'>

    {{ csrf_field() }}

    <label for='email'>E-Mail Address</label>
    <input id='email' type='email' dusk='email-input' name='email' value='{{ old('email') }}' required autofocus>
    @include('includes.error-field', ['fieldName' => 'email'])

    <label for='password'>Password</label>
    <input id='password' type='password' dusk='password-input' name='password' required>
    @include('includes.error-field', ['fieldName' => 'password'])

    <label>
        <input type='checkbox' name='remember' {{ old('remember') ? 'checked' : '' }}> Remember Me
    </label>

    <button type='submit' dusk='login-button' class='btn btn-primary'>Login</button>

    <a class='btn btn-link' href='{{ route('password.request') }}'>Forgot Your Password?</a>

</form>

@endsection