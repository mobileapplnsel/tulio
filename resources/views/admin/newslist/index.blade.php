@extends('layouts.admin')

@section('content')
<div class="card">
	<div class="card-header">
        <h4>NewsLetter</h4>
    </div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th scope="col">Type</th>
						<th scope="col">Name</th>
						<th scope="col">Email</th>
						<th scope="col">Phone</th>
						<th scope="col">News Letter Subscribe</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($data as $item)
					<tr>
						<td>{{$item->id}}</td>
						<td>{{$item->type}}</td>
						<td>{{$item->name}}</td>
						<td>{{$item->email}}</td>
						<td>{{$item->phone}}</td>
						<td>{{$item->news_letter_text}}</td>
					</tr>

					@endforeach
				</tbody>
			</table>
		</div>
		{{$data->links()}}
	</div>
</div>

@endsection

@section('script')
@endsection
