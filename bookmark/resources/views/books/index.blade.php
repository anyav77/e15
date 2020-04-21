@extends('layouts.master')

@section('title')
All Books
@endsection

@section('head')
<link href='/css/books/index.css' rel='stylesheet'>
@endsection

@section('content')

<div id='newBooks'>
    <h2>Recently Added Books</h2>
    <ul>
        @foreach($newBooks as $book)
        <li><a href='/books/{{ $book->slug }}'>{{ $book->title }}</a></li>
        @endforeach
    </ul>
</div>

<h1>All Books</h1>
@if(count($books) == 0)
No books have been added yet...
@else
<div id='books'>
    @foreach($books as $book)
    <a class='book' href='/books/{{ $book->slug }}'>
        <h3>{{ $book->title }}</h3>
        <img class='cover' src='{{ $book->cover_url }}'>
    </a>
    </a>
    @endforeach
</div>
@endif

@endsection