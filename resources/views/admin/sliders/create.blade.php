@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Add Video</h3>
        </div>
        <div class="card-body">
            {{ Form::open(array('route' => 'admin.slides.store', 'method'=>'POST', 'files' => true)) }}

<div class="form-group">
    <label for="title">Title</label>
     {!! Form::text('title',null, ["placeholder"=>"Enter title","class"=>"form-control", "id"=>"title"]) !!}
        @error('title')
        <strong>{{ $message }}</strong>
        @enderror
  </div>
  
  <div class="form-group">
    <label for="description">Description</label>
     {!! Form::text('description',null, ["placeholder"=>"Enter Description","class"=>"form-control", "id"=>"description"]) !!}
        @error('description')
        <strong>{{ $message }}</strong>
        @enderror
  </div>

  <div class="form-group">
    <label for="description">Product Link</label>
     {!! Form::text('product_link',null, ["placeholder"=>"Enter Product Link","class"=>"form-control", "id"=>"product_link"]) !!}
        @error('product_link')
        <strong>{{ $message }}</strong>
        @enderror
  </div>

  <div class="form-group">
    <label for="photo">Video </label>
    {!! Form::file('photo',["placeholder"=>"Upload Video","class"=>"form-control", "id"=>"photo"]) !!}
        @error('photo')
        <strong>{{ $message }}</strong>
        @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
<span style="font-size:12px"> (Preferable size 1280x720 px mp4 video)</span>
  {{Form::close()}}
  @endsection