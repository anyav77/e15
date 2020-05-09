@extends('layouts.master')

@section('title')
Add {{ $book->title }} to your list
@endsection

@section('content')
<h1>Add to your list</h1>
<h2>{{ $book->title }}</h2>

<form method='POST' action='/list/{{ $book->slug }}/add'>
    <div class='details'>* Required fields</div>
    {{ csrf_field() }}

    <label for='notes'>YOUR NOTES ON THIS BOOK </label>
    <textarea name='notes'>{{ old('notes') }}</textarea>

    <input type='submit' class='btn btn-primary' value='Save'>
</form>
@endsection