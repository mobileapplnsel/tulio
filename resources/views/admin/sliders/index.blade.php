@extends('layouts.admin')

@section('content')

<div class="card">
  <div class="card-header">
<a href="{{route('admin.slides.create')}}" class="btn btn-primary">Add Video</a>
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
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col" style="width: 111px;">Product Link</th>
          <th scope="col">Video</th>   
          <th scope="col" width=150>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($sliders as $slider)
        <tr>
          <td>{{$slider->title}}</td>
          <td>{{$slider->description}}</td>
          <td style="width: 111px;"><a href="{{$slider->product_link}}" class="btn btn-primary d-none d-sm-inline-block">Click Me</a></td>
          <td><video src="{{url('images')}}/{{$slider->photo}}" width="150"></video>
            <td>
              {!! Form::open(['method' => 'DELETE', 'route' => ['admin.slides.destroy', $slider->id],'class'=>'form-inline' ]) !!}
              <a href="{{ route('admin.slides.edit', $slider->id) }}" class="btn btn-secondary mr-4">Edit</a>
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


