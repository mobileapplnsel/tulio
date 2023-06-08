@extends('layouts.admin')

@section('content')
<div class="card">

	<div class="card-header">

		<a href="{{route('admin.user.create')}}" class="btn btn-primary">Add User</a>
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
					    <th scope="col">User Name</th>
					    <th scope="col">User Email</th>   
					    <th scope="col">User Type</th>   
						<th scope="col" >Action</th>
					</tr>
				</thead>
				<tbody>
					@forelse ($users as $user)
					<tr>
						   <td>{{$user->id}}</td>
					       <td>{{$user->name}}</td>
					       <td>{{$user->email}}</td>
					       <td>{{$user->user_type_text}}</td>
    
						   <td>
							{!!Form::open(['route'=> ['admin.user.destroy',$user->id], 'method'=> 'delete','class'=>'form-inline'])!!}
							<a href="{{route('admin.user.edit',$user->id)}}" class="btn btn-secondary mr-4">Edit</a> 
							<button type="submit" class="btn btn-danger " onclick="return confirm('Are you sure?')">Delete</button>
							{!!Form::close()!!}
							@if(! isset($user->email_verified_at))
							<a href="approve/{{$user->id}}" class="btn btn-success mr-4">Approve</a> 
							@endif
							

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
		{{$users->links()}}
	</div>
</div>

@endsection

@section('script')
@endsection
