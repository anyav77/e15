@extends('layouts.master')
@section('title')
Articles - Wiki
@endsection

@section('head')

@endsection

@section('content')
<h1>Wiki</h1>
<p>Explore the collection of articles on film studies:</p>
<p>Are you an instuctor, a subject matter expert or film enthusiast with a passion for writing?
    <a href='/wiki/create'>Publish your article.</a> As
    a published author, you can also promote your book or idea.</p>
<p>Not ready to start writing? You can refer your friend or colleague.</p>
<h2>Featured article</h2>
<h2>Recently Published Articles</h2>
<ul>
    @foreach($newArticles as $article)
    <li><a href='/wiki/{{ $article->id }}/{{ $article->slug }}'>{{ $article->title }}</a></li>
    @endforeach
</ul>
@if(count($articles) == 0)
No articles have been added yet...
@else
<h2>Recently Viewed - Read history</h2>
<h2>Saved articles</h2>
<h2>Your Drafts</h2>
<h2>All Articles</h2>
@foreach($articles as $article)
<a href='/wiki/{{ $article->id }}/{{ $article->slug }}'>
    <h3>{{ $article->title }}</h3>
</a>
@endforeach
@endif
{{-- add pagination --}}
@endsection