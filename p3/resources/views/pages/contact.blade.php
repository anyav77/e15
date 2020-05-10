@extends('layouts.master')
@section('title')
Contact Us
@endsection

@section('head')

@endsection

@section('content')
<h1>Contact us</h1>
<p>Phone: {{config('app.supportPhone')}}</p>
<p>Email: {{config('mail.supportEmail')}}</p>
<p>
    Please allow 24 hours for response.
</p>
@endsection