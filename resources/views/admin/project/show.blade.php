@extends('layouts.admin')
@section('style')
	<style>
		.accordion-body li {
  list-style: none;
  display: inline-block;
}
.accordion-button {
  width: 100%;
  text-align: left;
  padding: 10px;
  background-color: #30445b;
  color: white;
}

.accordion-button::after{
    content: "";
    width: 15px;
    height: 15px;
    border-left: 2px solid rgb(255, 255, 255);
    border-bottom: 2px solid rgb(255, 255, 255);
    transform: rotate(-45deg);
    left: 10px;
    top: 50%;
    display: inline-block;
    float: right;
    margin-right: 5px;
}
	</style>
@endsection
@section('content')
<div class="card">
	<div class="card-header">
		<h2>{{$project->name}}</h2>
		<a href="{{route('admin.project.export',$project)}}" class="btn btn-secondary float-right">Export</a>
	</div>
	<div class="card-body">
		<div class="accordion">
			@foreach ($project->rooms as $room)
			<div class="accordion-item">
				<h2 class="accordion-header" id="heading-{{$loop->index+1}}">
				  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$loop->index+1}}" aria-expanded="true" aria-controls="collapseOne">
					{{$room->name}}
				  </button>
				</h2>
				<div id="collapse-{{$loop->index+1}}" class="accordion-collapse collapse show" aria-labelledby="heading-{{$loop->index+1}}" data-bs-parent="#accordionExample">
				  <div class="accordion-body">
					@foreach ($room->products as $product)
						<li>
							<div class="desktop-image image-container">
								<div class="flex-box row">
									<div class="col_6">
										<img loading="lazy" src="{{$product->product->setColor($product->color_id)->closeup_image_thumb}}" alt="" class="" />
									</div>
									<div class="col_6">
										<div class="productDetails">
											<div class="flex-box">
												<h2><a href="http://tulio.design/product/{{$product->product->p_cd}}">{{$product->name}}</a>  </h2>
												<div class="productOption">
													<span style="float:left;">
														<span class="colorcircle" style="background-color:#{{$product->color}};margin-right:10px"></span>
													</span>
												</div>
											</div>
											<div class="priceBox">
												<p><b>{{convert_currency($product->price)}}</b></p>
											</div>

											<div class="productInfo">
												<p>Quantity - <span class="value">{{$product->quantity}}</span></p>
												<p>Unit Dimensions <span class="value">{{$product->width}} X {{$product->length}} {{$product->unit}} </span></p>
												<p>Lining Type - <span class="value">{{$product->lining_type}}</span></p>
												<p>Hardware Type - <span class="value">{{$product->hardware_type}}</span></p>
												@if ($product->hardware_type=='Motorized')
													<p>Power Type - <span class="value">{{$product->power_type}}</span></p>
													<p>Control Type - <span class="value">{{$product->control_type}}</span></p>
												@endif
											</div>

										</div>
									</div>
								</div>
							</div>
						</li>                                          
						@endforeach 
				  </div>
				</div>
			  </div>
			@endforeach
		  </div>
    </div>
</div>
<div class="card">
	<div class="card-header">
		<h3>Assigned User</h3>
	</div>
	<div class="card-body">
		{!! Form::model($project,['route'=>['admin.project.update',$project],'method'=>'PUT']) !!}
		<div class="form-group">
			<label for="">User</label>
			{!! Form::select('assign_user_id', $users, null, ['class'=>'form-control','placeholder'=>'Select User']) !!}
		</div>
		<div class="form-group my-2">
			<button class="btn btn-primary" type="submit">Assign</button>
		</div>
		{!! Form::close() !!}
	</div>
</div>

@endsection

@section('script')
@endsection
