@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Add Design</h3>
        </div>
        <div class="card-body">
            {{ Form::open(array('route' => 'admin.design.store', 'method'=>'POST', 'files' => true)) }}

<div class="form-group">
    <label for="name">Design</label>
     {!! Form::text('name',null, ["placeholder"=>"Enter Design","class"=>"form-control", "id"=>"name"]) !!}
        @error('name')
        <strong>{{ $message }}</strong>
        @enderror
  </div>


 
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>

  {{Form::close()}}
  @endsection