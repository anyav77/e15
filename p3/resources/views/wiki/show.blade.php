@extends('layouts.master')

@section('title')
{{-- {{ $book ? $book->title : 'Book not found' }} --}}
@endsection

@section('head')

@endsection

@section('content')
@if(!$article)
Article not found. <a href='/books'>Check out the other articles in our library...</a>
@else
<h1>{{ $article->title }}</h1>
<p class='description'>
    {{ $article->content }}
    <a href='/'>Login to continue reading</a>
    {{-- update this link --}}
</p>
<p>
    <a class='btn btn-primary' href='/wiki/{{ $article->id }}/{{ $article->slug }}/edit'>Edit - for authors only</a>
    Save, Remove from the list, Contribute content (comments) - registered users
</p>


<h2><a href='/'>More by this author</a></h2>
<p>The list of articles by author</p>
@endif

@endsection