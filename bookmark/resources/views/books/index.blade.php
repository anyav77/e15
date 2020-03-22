@extends('layouts.master')

@section('title')
    All Books
@endsection

@section('head')
    <link href='/css/books/index.css' rel='stylesheet'>
@endsection

@section('content')
    <h1>All Books</h1>

    @if(count($books) == 0) 
        No books have been added yet...
    @else
        @foreach($books as $slug => $book)
            <a href='/books/{{ $slug }}'>
            <img class='cover' src='{{ $book['cover_url'] }}'></a>
        @endforeach
    @endif
@endsection