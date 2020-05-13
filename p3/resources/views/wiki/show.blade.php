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
</p>
<p>
    <a dusk='update-button' class='btn btn-primary' href='/wiki/{{ $article->id }}/{{ $article->slug }}/edit'>Edit</a>

</p>

@endif

@endsection