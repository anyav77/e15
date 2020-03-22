@extends('layouts.master')

@section('title')
{{ $book['title'] }}
@endsection

@section('head')
{{-- Page specific CSS includes should be defined here; this .css file does not exist yet, but we can create it --}}
<link href='/css/books/show.css' rel='stylesheet'>
@endsection

@section('content')

<img class='cover' src='{{ $book['cover_url'] }}' alt='Cover photo for {{ $book['title'] }}'>

<h1>{{ $book['title'] }}</h1>

<p>By {{ $book['author'] }} ({{$book['published_year']}})</p>

<p class='description'>
    {{ $book['description'] }}
    <a href='{{$book['info_url']}}'>Learn more...</a>
</p>

<a href='{{$book['purchase_url']}}'>Purchase...</a>

@endsection