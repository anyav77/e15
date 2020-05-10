{{-- /resources/views/books/create.blade.php --}}
@extends('layouts.master')

@section('title')
Add an Article
@endsection

@section('content')
<h1>Add an article</h1>

<p>Are you an author who wants to contribute to the knowledgebase?
    Not a problem- you can write an article and publish it here!</p>

<form method='POST' action='/wiki'>
    <div class='details'>* Required fields</div>
    {{ csrf_field() }}

    <label for='title'>* Title</label>
    <input type='text' name='title' id='title'>


    <label for='author'>* Author</label>
    <input type='text' name='author' id='author'>


    <label for='published_year'>* Published Year (YYYY)</label>
    <input type='text' name='published_year' id='published_year'>

    <label for='cover_url'>Cover URL</label>
    <input type='text' name='cover_url' id='cover_url' value='http://'>

    <label for='info_url'>* Wikipedia URL</label>
    <input type='text' name='info_url' id='info_url' value='http://'>

    <label for='purchase_url'>* Purchase URL </label>
    <input type='text' name='purchase_url' id='purchase_url' value='http://'>

    <label for='description'>Description</label>
    <textarea name='description'></textarea>

    <input type='submit' value='Publish an article'>
    @if(count($errors) > 0)
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
</form>
@endsection