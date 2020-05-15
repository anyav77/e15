@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div dusk='dashboard' class="card-header">Dashboard - you are logged in!
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <br>
                    <p><a href="/wiki/create">Start writing</a></p>

                    <h2>Your Published Articles:</h2>
                    <ul>
                        {{-- this code throws an error:--}}
                        {{-- Invalid argument supplied for foreach() (View: C:\xampp\htdocs\e15\p3\resources\views\home.blade.php) --}}
                        {{-- @foreach($userArticles as $article)
                        <li>{{ $article}}</li>
                        @endforeach --}}

                        @foreach($userArticles as $article)
                        <li>{{ $article->title }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection