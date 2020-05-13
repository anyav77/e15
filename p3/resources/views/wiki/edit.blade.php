{{-- /resources/views/books/create.blade.php --}}
@extends('layouts.master')

@section('title')
Edit Article
@endsection

@section('content')
<h1>Edit article</h1>

<p>Did you get a new idea, or just noticed a typo in your content?
    You can edit and resubmit your article:</p>

<form method='POST' action='/wiki/{{ $article->id }}/{{ $article->slug }}'>
    <div class='details'>* Required fields</div>

    {{ csrf_field() }}
    {{  method_field('put') }}

    <label for='title'>* Title</label>
    <input type='text' name='title' id='title' value='{{ old('title', $article->title) }}'>
    @include('includes.error-field', ['fieldName' => 'title'])

    <label for='content'>* Content</label>
    <textarea name='content' rows='15'>{{ old('content', $article->content) }}</textarea>
    @include('includes.error-field', ['fieldName' => 'content'])

    <input class='btn btn-primary' type='submit' value='Update you article'>
</form>

@endsection