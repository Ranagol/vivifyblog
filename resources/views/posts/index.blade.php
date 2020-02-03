@extends('master')

@section('title', 'index')

@section('content')
<ul>
  @foreach($posts as $post)
   <li>
    <a href="/posts/{{ $post->id }}">{{ $post->title}}
    </a>
    <div>{{ $post->content }}</div>
   </li>
  @endforeach
 </ul>

@endsection