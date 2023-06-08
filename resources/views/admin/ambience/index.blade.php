@extends('layouts.admin')

@section('content')

<div class="card">
  <div class="card-header">
<a href="{{route('admin.ambience.create')}}" class="btn btn-primary">Add Ambience</a>
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
          <th scope="col">Ambience</th>   
          <th scope="col" width=150>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($ambiences as $ambience)
        <tr>
          <td>{{$ambience->name}}</td>
            <td>
              {!! Form::open(['method' => 'DELETE', 'route' => ['admin.ambience.destroy', $ambience->id],'class'=>'form-inline' ]) !!}
              <a href="{{ route('admin.ambience.edit', $ambience->id) }}" class="btn btn-secondary mr-4">Edit</a>
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


