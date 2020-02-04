@extends('master')

@section('title')

@section('content')

<h2>Title: {{ $post->title }}</h2>
<p>Content: {{ $post->body }}</p>
<p>Published: {{ $post->published }}</p>
<p>Created at: {{ $post->created_at }}</p>


@endsection