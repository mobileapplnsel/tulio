@extends('layouts.admin')

@section('content')
<div class="card">
	<div class="card-header">
		<a href="{{route('admin.category.create')}}" class="btn btn-primary">Add Category</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th scope="col">Category Name</th>
						<th scope="col">Slug</th>
						<th scope="col">Category Description</th>
						<th scope="col">Parent Category</th>
						<th scope="col">Image</th>
						<th scope="col" width=150>Action</th>
					</tr>
				</thead>
				<tbody>
					@forelse ($category as $cat)
					<tr>
						<td>{{($category->currentPage()-1)*$category->perPage() + $loop->iteration}}</td>
						<td>{{$cat->cat_nm}}</td>
						<td>{{$cat->slug}}</td>
						<td>{{$cat->cat_ds}}</td>
						<td>{{optional($cat->parent)->cat_nm}}</td>
						<td><img src="{{$cat->image_url}}" width="50">
						</td>
						<td>
							{!!Form::open(['route'=> ['admin.category.destroy',$cat->cat_id], 'method'=> 'delete','class'=>'form-inline'])!!}
							<a href="{{route('admin.category.edit',$cat->cat_id)}}" class="btn btn-secondary mr-4">Edit</a>
							<button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
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
		{{$category->links()}}
	</div>
</div>

@endsection

@section('script')
@endsection
