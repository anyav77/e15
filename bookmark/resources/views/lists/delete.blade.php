@extends('layouts.master')

@section('title')
Remove {{ $book->title }} from your list
@endsection

@section('head')
<link href='/css/books/show.css' rel='stylesheet'>
@endsection

@section('content')
@if(!$book)
Book not found. <a href='/books'>Check out the other books in our library...</a>
@else
<img class='cover' src='{{ $book->cover_url }}' alt='Cover photo for {{ $book->title }}'>
<h1>Are you sure you want to remove{{ $book->title }} from your list?</h1>
<a href='/list/'>Back</a>

<form method='POST' action='/list/{{ $book->slug }}/destroy'>

    {{ csrf_field() }}
    {{  method_field('delete') }}

    <input type='submit' class='btn btn-primary' value='Confirm Removal'>
</form>
@endif
@endsection