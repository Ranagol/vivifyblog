@extends('master')

@section('title')

@section('content')

<hr>

<h2><a href="/users/{{ $post->user->id}}">Autor: {{ $post->user->name}}</a></h2>
<hr>



<h2>Title: {{ $post->title }}</h2>
<p>Content: {{ $post->body }}</p>
<p>Published: {{ $post->published }}</p>
<p>Created at: {{ $post->created_at }}</p>



<h4>Napravi nov komentar</h4>

<form method="POST" action="/posts/{{$post->id}}/comments">
  @csrf
  <div class="form-group">
      <label for="author">Your name:</label>
      <input type="text" class="form-control" id="author" name="author"/>
  </div>
  <div class="form-group">
      <label for="text">Comment:</label>
      <textarea class="form-control" id="body" name="body"></textarea>
  </div>
  <div class="form-group">
      <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>


<h4>Komentari</h4>






@if(count($post->comments))<!--zastita, za slucaj kada nemamo komentare-->
  @foreach($post->comments as $comment)
  <li>{{ $comment->author }}</li>
  <li>{{ $comment->body }}</li>
  @endforeach
@endif



@endsection