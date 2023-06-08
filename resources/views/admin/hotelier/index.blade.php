@extends('layouts.admin')

@section('content')
<div class="card">
	<div class="card-header">
		<a href="{{route('admin.hotelier.create')}}" class="btn btn-primary">Add Hotel</a>
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
						<th scope="col">Hotel Name</th>
						<th scope="col">Hotel Address</th>
						<th scope="col">Slug</th>
						<th scope="col">Hotel Description</th>
						<th scope="col" width=120>Hotel Sequence</th>
						<th scope="col" width=150>Action</th>
					</tr>
				</thead>
				<tbody>
					@php $i=1; @endphp
					@forelse ($hotels as $hotel)
					
					<tr>
						<td>{{$i++}}</td>
						<td>{{$hotel->name}}</td>
						<td>{{$hotel->address}}</td>
						<td>{{$hotel->slug}}</td>
						<td>{{$hotel->description}}</td>
						<td>				
							<input name="sequence" class="form-inline col-4 sequence" type="text" value="<?php echo $hotel->sequence?>">
							<input name="hotelid" class="hotelid" type="hidden" value="<?php echo $hotel->id?>">
							<button class="btn btn-success mr-2 sequenceChange">Save</button>
						</td>
						<td>
							{!!Form::open(['route'=> ['admin.hotelier.destroy',$hotel->id], 'method'=> 'delete','class'=>'form-inline'])!!}
							<a href="{{route('admin.hotelier.edit',$hotel->id)}}" class="btn btn-secondary mr-4">Edit</a>
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
		{{$hotels->links()}}
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>


<script>
	$('.sequenceChange').click(function () {
		var id = $(this).prev().val();
        var sequence = $(this).prev().prev().val();
        $.ajax({
            type: "get",
            dataType: "json",
            url: '/admin/changeSequence',
            data: {'id': id, 'sequence': sequence},
            success: function (data) {
				location.reload();
				// $('.card-body').addClass('text-success').show(function(){
				// 	$(this).html(data.success);
				// })
            }
        });
    });
</script>

@endsection

<!-- @section('script')
@endsection -->
