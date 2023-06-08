@extends('layouts.admin')

@section('content')


{{ Form::open(array('route' => 'admin.signature_products.store', 'method'=>'POST')) }}
<h4>Select Signature Products</h4>
<div class="row">


  <div class="card">
    <div class="card-header">
    </div>
    <div class="card-body">
        <div class="row">
            @foreach ($products as $product)

            @if(in_array($product->p_cd,$signature_products->products))
            <div class="col-sm-3" style="margin-bottom: 8px;">
              {!! Form::checkbox($product->p_cd,$product->p_cd,true) !!}
                {{$product->detail->pd_nm}} : {{$product->p_cd}}
            </div>

            @else
            <div class="col-sm-3" style="margin-bottom: 8px;">
              {!! Form::checkbox($product->p_cd,$product->p_cd,false) !!}
                {{$product->detail->pd_nm}} : {{$product->p_cd}}
            </div>

            @endif


            @endforeach
            @error('selected_products')
            <strong class="text-danger">{{ $message }}</strong>
            @enderror
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-11"></div>
    <div class="col-sm-1">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

</div>
{!! Form::close() !!}




@endsection
