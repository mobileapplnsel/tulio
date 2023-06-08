@extends('layouts.admin')

@section('content')
<div class="card">
	<div class="card-header">
		{!! Form::open(['route'=>'admin.project.index','method'=>'GET']) !!}
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						{!! Form::label('name', 'Name') !!}
						{!! Form::text('name', request('name'), ['class'=>'form-control']) !!}
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						{!! Form::label('name', 'Status') !!}
						{!! Form::select('status', [''=>'All','active'=>'Active','complete'=>'Complete'], request('status'), ['class'=>'form-control']) !!}
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						{!! Form::label('name', 'Assign To') !!}
						{!! Form::select('assign_user_id', $users, request('assign_user_id'), ['class'=>'form-control','placeholder'=>'All User']) !!}
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<br>
						{!! Form::submit('Search', ['class'=>'btn btn-primary']) !!}
						@if (request('name') || request('status') || request('assign_user_id'))
						<a href="{{ route('admin.project.index') }}" class="btn btn-secondary">Reset</a>
						@endif
					</div>
				</div>
			</div>
		{!! Form::close() !!}
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
						<th>#</th>
						<th scope="col">Name</th>
						<th scope="col">User Name</th>
						<th scope="col">Assign User Name</th>
						<th scope="col">Budget</th>
						<th scope="col">Status</th>
						<th scope="col" width=150>Action</th>
					</tr>
				</thead>
				<tbody>
					@forelse ($projects as $project)

					<tr>
						<td>{{($projects->perPage()*($projects->currentPage()-1))+$loop->index+1}}</td>
						<td>{{$project->name}}</td>
						<td>{{optional($project->user)->name}}</td>
						<td>{{optional($project->assign_user)->name}}</td>
						<td>{{$project->budget}}</td>
						<td>{{\Str::title($project->status)}}</td>
						<td>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['admin.project.destroy', $project],'class'=>'form-inline' ]) !!}
                            <a href="{{route('admin.project.show',$project)}}" class="btn btn-secondary mr-4">View</a>
                            <button class="btn btn-block btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                            {!! Form::close() !!}
                        </td>
					</tr>
					@empty
						<tr>
							<td colspan="12">There is no data </td>
						</tr>
					@endforelse
				</tbody>
			</table>
		</div>
		<strong class="float-right">Total : {{$projects->total()}}</strong>
		{{$projects->links()}}
	</div>
</div>

@endsection

@section('script')
@endsection
