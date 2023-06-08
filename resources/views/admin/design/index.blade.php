@extends('layouts.admin')

@section('content')

<div class="card">
  <div class="card-header">
<a href="{{route('admin.design.create')}}" class="btn btn-primary">Add Design</a>
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
          <th scope="col">Design</th>   
          <th scope="col" width=150>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($designs as $design)
        <tr>
          <td>{{$design->name}}</td>
            <td>
              {!! Form::open(['method' => 'DELETE', 'route' => ['admin.design.destroy', $design->id],'class'=>'form-inline' ]) !!}
              <a href="{{ route('admin.design.edit', $design->id) }}" class="btn btn-secondary mr-4">Edit</a>
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


