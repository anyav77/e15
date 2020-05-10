@extends('layouts.master')
@section('title')
Articles - Wiki
@endsection

@section('head')

@endsection

@section('content')
<h1>Wiki</h1>

<p>Publish your article, promote your book or idea, or search the articles</p>
<p>Recently Added</p>
<p>Recently Viewed - Read history</p>
<p>Saved articles</p>
<p>Your Drafts</p>

{{-- <div id='newBooks'>
    <h2>Recently Added Books</h2>
    <ul>
        @foreach($newBooks as $book)
        <li><a href='/books/{{ $book->slug }}'>{{ $book->title }}</a></li>
@endforeach
</ul>
</div>

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
@endif --}}
@endsection