@extends('layouts.admin')

@section('content')
<div class="card">
	<div class="card-header">
		<a href="{{route('admin.colour.create')}}" class="btn btn-primary">Add Colour</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th scope="col">Colour Name</th>
                        <th scope="col">Colour Number</th>   
						<th scope="col" width=150>Action</th>
					</tr>
				</thead>
				<tbody>
					@forelse ($colours as $colour)
					<tr>
						<td>{{($colours->currentPage()-1)*$colours->perPage() + $loop->iteration}}</td>
					     <td>{{$colour->c_nm}}</td>
					     <td><span style="padding: 10px 18px;background-color: #{{$colour->c_no}};
							border-radius: 30px;margin-right: 8px;"></span>{{$colour->c_no}}</td>
    
						<td>
							{!!Form::open(['route'=> ['admin.colour.destroy',$colour->c_id], 'method'=> 'delete','class'=>'form-inline'])!!}
							<a href="{{route('admin.colour.edit',$colour->c_id)}}" class="btn btn-secondary mr-4">Edit</a> 
							{{-- <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button> --}}
							{!!Form::close()!!}
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
		{{$colours->links()}}
	</div>
</div>

@endsection

@section('script')
@endsection
