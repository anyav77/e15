@extends('layouts.master')
@section('title')
Advanced Search
@endsection

@section('head')

@endsection

@section('content')
<h1>Advanced Search</h1>
<form method='GET' action='/searchresults/'>
    <fieldset>
        <input type='text' name='searchTerms' id='searchTerms' value='{{old('searchTerms', $searchTerms)}}'>
    </fieldset>

    <fieldset>
        <label>
            Search type:
        </label>

        <input type='radio' name='searchType' id='title' value='title'
            {{ (old('searchType') == 'title' or $searchType=='title') ? 'checked' : ''}}>
        <label for='title'> Title</label>

        {{-- <input type='radio' name='searchType' id='author' value='author'
            {{ (old('searchType') == 'author' or $searchType=='author') ? 'checked' : ''}}>
        <label for='author'> Author</label> --}}

    </fieldset>
    {{-- I need to add dropdowns for category and subcategory --}}


    <input type='submit' class='btn btn-primary' value='Search'>
    @if(count($errors) > 0)
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
</form>

@if(!is_null($searchResults))
@if(count($searchResults) == 0)
<div class='results alert alert-warning'>
    No results found.
</div>
@else
<div class='results alert alert-primary'>

    {{ count($searchResults) }}
    {{ Str::plural('Result', count($searchResults)) }}:

    <ul>
        @foreach($searchResults as $slug => $book)
        <li><a href='/books/{{ $slug }}'> {{ $book['title']   }}</a></li>
        @endforeach
    </ul>
</div>
@endif
@endif
@endsection