@extends('master')
@section('title')
@section('content')
<div class="container">
  <h2>Create blade</h2>
<!--OVO JE FORMA ZA SLANJE REGISTROVANIH PODATAKA -->
<form method="POST" action="/register">
  @csrf
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="name">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" id="password">
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection

