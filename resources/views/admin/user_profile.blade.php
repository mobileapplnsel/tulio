@extends('layouts.admin')

@section('content')
{!! Form::open(['route'=>'admin.updateprofile', 'method'=>'POST']) !!}
<div class="card">
	<div class="card-header">
		  <h4>Update Profile</h4>
	</div>
	<div class="card-body">
	<form action="" method="post">
		@csrf
		<div class="mb-3">
			<label class="form-label">Name</label>
			<input class="form-control form-control-lg" type="text" value="{{$user_detail->name}}" name="u_name" placeholder="Enter your name" />
			@error('email')
			<span class="text-danger">{{$message}}</span>
			@enderror
		</div>
		<div class="mb-3">
			<label class="form-label">Email</label>
			<input class="form-control form-control-lg" type="email" value="{{$user_detail->email}}"name="u_email" placeholder="Enter your email" />
			@error('email')
			<span class="text-danger">{{$message}}</span>
			@enderror
		</div>
		<div class="mb-3">
			<label class="form-label">Password</label>
			<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" />
		</div>
		<div class="mb-3">
			<label class="form-label">Confirm Password</label>
			<input class="form-control form-control-lg" type="password" name="c_password" placeholder="Enter your confirm password" />
		</div>
		<div class="mb-3">
             <button type="submit"  class="btn btn-primary" name="" >Update Profile</button>
		</div>
		</form>
	</div>
</div>
{!! Form::close() !!}

@endsection

@section('script')
@endsection
