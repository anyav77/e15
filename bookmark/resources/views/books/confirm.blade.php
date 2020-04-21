@extends('layouts.master')

@section('title')
{{ $book ? $book->title : 'Book not found' }}
@endsection

@section('head')
<link href='/css/books/show.css' rel='stylesheet'>
@endsection

@section('content')

@if(!$book)
Book not found. <a href='/books'>Check out the other books in our library...</a>
@else
<img class='cover' src='{{ $book->cover_url }}' alt='Cover photo for {{ $book->title }}'>

<h1>Are you sure you want to delete {{ $book->title }}?</h1>

<a class='btn btn-primary' href='/books/{{ $book->slug }}'>Back</a>

<form method='POST' action='/books/{{ $book->slug }}'>
    {{ csrf_field() }}

    {{  method_field('delete') }}
    <input type='submit' class='btn btn-primary' value='Confirm Delete'>
</form>
{{-- <a class='btn btn-primary' href='/books/{{ $book->slug }}/'>Confirm Delete</a> --}}
@endif

@endsection