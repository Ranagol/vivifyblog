@extends('master')
@section('title', 'Posts')
@section('content')
<div class="container">
  <h2>Login</h2>
  <form action="/login" method="POST">
    @csrf
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" id="email" name="email" class="form-control" />
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="text" id="password" name="password" class="form-control" />
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
  @if(count($errors->all()) > 0)
    @foreach($errors->all() as $error)
      <div class="alert alert-danger">
        {{$error}}
      </div>
    @endforeach
  @endif
</div>


@endsection





