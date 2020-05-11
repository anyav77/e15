@extends('layouts.master')
@section('title')
Welcome to Educational Film Network!
@endsection

@section('head')

@endsection

@section('content')
<h1>Welcome!</h1>

<p>
    This site is a resource for instructors who are doing curriculum development, and for the filmmakers who want to
    promote their films.
    We welcome researchers and filmmakers to post content related to film studies.
</p>
<p>
    <a href='/wiki/'>Browse the wiki</a>, or <a href='/wiki/create'>publish your article</a>, promote your book or film.
</p>
<h2>What's new</h2>
<h3>Recently Published Articles</h3>
<ul>
    @foreach($newArticles as $article)
    <li><a href='/wiki/{{ $article->id }}/{{ $article->slug }}'>{{ $article->title }} </a> </li>
    @endforeach
</ul>
@if(count($articles)==0)
No articles have been added yet...
@endif
<h3>Recommended for you</h3>
<p>Register to get access to all the content</p>
@endsection