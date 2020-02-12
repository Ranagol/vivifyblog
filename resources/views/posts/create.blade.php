@extends('master')

@section('title', 'index')

@section('content')
<h4>Create post page</h4>
<!-- zelimo da dodamo tagove kada dodajemo post. Nemamo pristup tagovima. Tagove smo naknadno dodali. OVo treba ispratiti. Seederima smo odredili koji tagovi priapdaju kojim postovima. Nama treba pristup tagovima, ovtagove dobijamo od PSot Contorlera-->
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
  <!--stizuuu tagovi ovde, u array. Imamo 5 tagova u tags, ovo cemo prikazivati -->
  @if(count($tags))
  <div class="form-group">
    @foreach($tags as $tag)
      <input type="checkbox" name="tags[]" value="{{ $tag->id }}" /><!-- kada se checkira checkbox, tag->id ulazi u prazan tag niz. Ovaj niz se prosleduje u request-->
      {{ $tag->name}}
    @endforeach
  </div>
  @endif
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









