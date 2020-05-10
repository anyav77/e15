@extends('layouts.master')

@section('title')
{{-- {{ $book ? $book->title : 'Book not found' }} --}}
@endsection

@section('head')

@endsection

@section('content')
Article page
{{-- @if(!$book)
Book not found. <a href='/books'>Check out the other books in our library...</a>
@else
<img class='cover' src='{{ $book->cover_url }}' alt='Cover photo for {{ $book->title }}'>

<h1>{{ $book->title }}</h1> --}}

{{-- @if($book->author)
<p>By {{ $book->author->first_name. ' ' . $book->author->last_name }}</p>
@endif
<p>({{ $book->published_year }})</p>

<a href='{{ $book->purchase_url }}'>Purchase...</a>

<p class='description'>
    {{ $book->description }}
    <a href='{{ $book->info_url }}'>Learn more...</a>
</p>
--}}
@if($books->count() == 0)
<a class='btn btn-primary' href='/list/{{ $book->slug }}/add'>Add to your list</a>
@else
<a class='btn btn-primary' href='/list/{{ $book->slug }}/delete'>Remove from your list</a>
@endif

<a class='btn btn-primary' href='/books/{{ $book->slug }}/edit'>Edit this book</a>
<a class='btn btn-primary' href='/books/{{ $book->slug }}/confirm'>Delete this book</a>
@endif

@endsection