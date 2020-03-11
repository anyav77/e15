@extends('layouts.master')

@section('title')
Book library...
@endsection

@section('content')
@if(count($books)==0)
No books have been added yet

@else
@foreach ($books as $book)
{{ $book['title']}}
@endforeach
@endif
@endsection