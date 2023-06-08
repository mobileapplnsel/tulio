@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Edit Technique</h3>
        </div>
        <div class="card-body">
{{ Form::model($technique, array('route' => array('admin.technique.update', $technique->id), 'method' => 'PUT', 'files' => true)) }}

<div class="form-group">
    <label for="name">Technique</label>
     {!! Form::text('name',null, ["placeholder"=>"Enter Technique","class"=>"form-control", "id"=>"name"]) !!}
        @error('name')
        <strong>{{ $message }}</strong>
        @enderror
  </div>
  
  
 
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
  {{Form::close()}}
  @endsection
  

