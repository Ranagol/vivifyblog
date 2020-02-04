@extends('master')

@section('title', 'index')

@section('content')
<h4>Create post page</h4>

<form method="POST" action="posts">
  @csrf
  <div class="form-group">
    <div >Title: <input class="form-control" type="text" name="title" id=""></div>
    <div >Content: <input class="form-control" type="text" name="body" id=""></div>
  </div>

  <div>Published:</div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="published" id="inlineRadio1" value="1">
    <label class="form-check-label" for="inlineRadio1">True</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="published" id="inlineRadio2" value="0">
    <label class="form-check-label" for="inlineRadio2">False</label>
  </div>
  <div><button type="submit" class="btn btn-info">Create</button></div>
</form>

@if(count($errors) > 0)
  @foreach($errors->all() as $error)
    <div class="alert alert-danger">
      {{$error}}
    </div>
  @endforeach
@endif







  








@endsection









