{{-- /resources/views/books/create.blade.php --}}
@extends('layouts.master')

@section('title')
New Article
@endsection

@section('content')
<h1>New article</h1>

<p>Are you an author who wants to contribute to the knowledgebase?
    Please submit your article:</p>

<form method='POST' action='/wiki'>
    <div class='details'>* Required fields</div>
    {{ csrf_field() }}

    <label for='title'>* Title</label>
    <input dusk='title-input' type='text' name='title' id='title' value='{{ old('title') }}'>
    @include('includes.error-field', ['fieldName' => 'title'])

    <label for='content'>* Content</label>
    <textarea dusk='content-input' name='content' rows='15'>{{ old('content') }}</textarea>
    @include('includes.error-field', ['fieldName' => 'content'])

    <input dusk='add-button' class='btn btn-primary' type='submit' value='Publish you article'>
</form>
Save draft
@endsection