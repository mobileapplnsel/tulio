@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="row">
        <div class="card-header col-md-3">
            {!! Form::open(['route'=>'admin.product.index','method'=>'GET']) !!}
            <a href="{{route('admin.product.create')}}" class="btn btn-primary">Add Product</a>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <br>
                {!! Form::select('category', $categories,request('category'),['placeholder'=>'Select Category','class'=>'form-control']) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{-- {!! Form::label('p_cd', 'Product_Name') !!} --}}
                <label for=""></label>
                {!! Form::text('p_cd', request('p_cd'), ['class'=>'form-control','placeholder'=>'Enter Product Name or Code']) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <br>
                {!! Form::submit('Search', ['class'=>'btn btn-primary']) !!}
                @if (request('p_cd') || request('category'))
                <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">Reset</a>
                @endif
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
                        <th scope="col">Code</th>
                        <th scope="col" width=150>Parent Category</th>
                        <th scope="col">Sub Category</th>
                        <th scope="col">Type</th>
                        <th scope="col">Colours</th>
                        <th scope="col">Technique</th>
                        <th scope="col">Ambience</th>
                        <th scope="col">Design</th>
                        <th scope="col" width=200>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                    <tr>
                        <td>{{($products->currentPage()-1)*$products->perPage() + $loop->iteration}}</td>
                        <td>{{optional($product->detail)->pd_nm}}</td>
                        <td>{{$product->p_cd}}</td>
                        @if($product->category->parent_id != 0)
                        <td> {{$categories[$product->category->parent_id]}}</td>
                        @else
                        <td> {{$product->category->cat_nm}} </td>
                        @endif
                        <td> {{$product->category->cat_nm}}</td>
                        <td>{{$product->detail->pd_sc}}</td>
                        <td>{{$product->colours->implode('colour.c_nm',', ')}}</td>
                        <td>{{implode(',', $product->detail->pd_tq??[])}}</td>
                        <td>{{implode(',', $product->detail->pd_am??[])}}</td>
                        <td>{{implode(',', $product->detail->pd_de??[])}}</td>
                        <td>
                            {!!Form::open(['route'=> ['admin.product.destroy',$product->p_id], 'method'=> 'delete','class'=>'form-inline'])!!}
                            <a href="{{route('admin.product.edit',$product->p_id)}}" class="btn btn-secondary mr-4">Edit</a>  
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            {!!Form::close()!!} 
                            @if ($product->featured==1)
                                @php
                                    $label="btn btn-success mr-4";
                                    $val="Featured";
                                    $featuredStatus=0;
                                @endphp
                            @else
                                @php
                                    $label="btn btn-info mr-4";
                                    $val="Non Featured";
                                    $featuredStatus=1;
                                @endphp
                            @endif
                            {!!Form::open(['route'=> ['admin.product.updateFeaturedStatus'], 'method'=> 'post','class'=>'form-inline'])!!}
							<input name="featuredStatus" type="hidden" value="{{$featuredStatus}}">
                            <input name="productId" type="hidden" value="{{$product->p_id}}">
							<button class="{{ $label }} updateFeaturedStatus">{{ $val }}</button>
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
        {{$products->links()}}
    </div>
</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script>
	$('.updateFeaturedStatus').click(function () {
		var id = $(this).prev().val();
        var featuredStatus = $(this).prev().prev().val();
        $.ajax({
            type: "get",
            dataType: "json",
            url: '/admin/updateFeaturedStatus',
            data: {'id': id, 'featuredStatus': featuredStatus},
            success: function (data) {
                alert(data);
				location.reload();
				// $('.card-body').addClass('text-success').show(function(){
				// 	$(this).html(data.success);
				// })
            }
        });
    });
</script>
@endsection