@extends('layouts.admin')

@section('content')

<div class="card">
  <div class="card-header">
<a href="{{route('admin.technique.create')}}" class="btn btn-primary">Add Technique</a>
</div>
<div class="card-body">
  @if (session('success'))
		<div class="text-success">
			{{ session('success') }}
		</div>
		@endif
  <div class="table-responsive">
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">Technique</th>   
          <th scope="col" width=150>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($techniques as $technique)
        <tr>
          <td>{{$technique->name}}</td>
            <td>
              {!! Form::open(['method' => 'DELETE', 'route' => ['admin.technique.destroy', $technique->id],'class'=>'form-inline' ]) !!}
              <a href="{{ route('admin.technique.edit', $technique->id) }}" class="btn btn-secondary mr-4">Edit</a>
              <button class="btn btn-block btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
              {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>
@endsection


