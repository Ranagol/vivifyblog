@extends('master')

@section('title', 'index')

@section('content')
<div>
  <h3>Ovde pocinje sesija</h3>
  @if($flash = session('message'))
    {{ $flash }}
  @endif
</div>










<h3>Ovo je index</h3>
<ul>
  @foreach($posts as $post)
   <li>
    @if($post->user)<!--zastita, jer nema svaki post usera -->
      <h4>Autor: {{ $post->user->name }}</h4>
    @endif
    




    <h4>Naslov: <a href="/posts/{{ $post->id }}">{{ $post->title}}</a></h4>
   
    <div>Sadrzaj: {{ $post->body }}</div>
   </li>
  @endforeach
 </ul>

 

@endsection