{{-- /resources/views/books/create.blade.php --}}

@extends('layouts.master')

@section('head')
<link href='/css/lists/show.css' rel='stylesheet'>
@endsection

@section('title')
My List
@endsection

@section('content')
@if($books->count() == 0)
<p>You have not added any books to your list yet.</p>
<p><a href='/books'>Find books to add in our library...</a></p>
@else

@foreach($books as $book)
<div class='book'>
    <a href='/books/{{ $book->slug }}'>
        <h2>{{ $book->title }}</h2>
    </a>
    @if($book->author)
    <p>By {{ $book->author->first_name. ' ' . $book->author->last_name }}</p>
    @endif
    <form method="POST" action='/list/{{ $book->slug }}'>
        {{ csrf_field() }}

        {{  method_field('put') }}
        <textarea class='notes' name='notes' id='notes'>{{ $book->pivot->notes }}</textarea>
        <p>
            <input type='submit' class='btn btn-primary' value='Update Note'>
        </p>
    </form>
    <p class='added'>
        Added {{ $book->pivot->created_at->diffForHumans() }}
    </p>
    <p>
        <a href='/list/{{ $book->slug }}/delete'><i class="fa fa-minus-circle"></i>Remove from the list</a>
    </p>
</div>
@endforeach

@endif
@endsection