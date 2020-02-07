@extends('master')

@section('title')

@section('content')


<h1>Users show</h1>

<div>{{ $user->name}}</div>

@foreach($user->posts as $post)<!--post je funckija post() definisan u User modelu -->
  <div>
    <p>
      <a href="/posts/{{ $post->id}}">Title: {{ $post->title}}</a>
    </p>
    <p>
     Body: {{ $post->body}}
    </p>
    <p>
     Created: {{ $post->created_at->toFormattedDateString()}}
    </p>
  </div>
@endforeach










@endsection