@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Edit Ambience</h3>
        </div>
        <div class="card-body">
{{ Form::model($ambience, array('route' => array('admin.ambience.update', $ambience->id), 'method' => 'PUT', 'files' => true)) }}

<div class="form-group">
    <label for="name">Ambience</label>
     {!! Form::text('name',null, ["placeholder"=>"Enter Ambience","class"=>"form-control", "id"=>"name"]) !!}
        @error('name')
        <strong>{{ $message }}</strong>
        @enderror
  </div>
  
  
 
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
  {{Form::close()}}
  @endsection
  

