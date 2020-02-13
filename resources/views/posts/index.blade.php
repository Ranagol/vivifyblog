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
    @if($post->user)<!--zastita, jer nema svaki post usera. Ako post ima usera... -->
      <h4>Autor: {{ $post->user->name }}</h4><!--.... onda echo user name -->
    @endif

    <p>Tagovi:
      <ul>
        @foreach($post->tags as $tag)<!--tags je methoda definisana u Post modelu -->
      <a href="/posts/tags/{{$tag->name }}"><li>{{ $tag->name }}</li></a>
          
        @endforeach
      </ul>
    </p>
    
    <h4>Naslov: <a href="/posts/{{ $post->id }}">{{ $post->title}}</a></h4>
   
    <div><strong>Sadrzaj:</strong> {{ $post->body }}</div>
   </li>
   <hr>
  @endforeach
 </ul>
 {{ $posts->render() }}


 

@endsection