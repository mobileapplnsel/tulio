@extends('layouts.admin')

@section('content')
{!! Form::model($hotelier,['route'=>['admin.hotelier.update',$hotelier], 'method'=>'PUT','files'=>true]) !!}
<div class="card">
    <div class="card-header">
        <h4>Hotel</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
               <div class="form-group">
                 <label for="name">Hotel name</label>
                 {!! Form::text('name',null, ["placeholder"=>"Enter hotel name","class"=>"form-control", "id"=>"name"]) !!}
                     @error('name')
                     <strong>{{ $message }}</strong>
                     @enderror
               </div>

           </div>
           <div class="col-sm-6">
               <div class="form-group">
                <label for="address">Hotel Address</label>
                {!! Form::text('address',null, ["placeholder"=>"Enter hotel address","class"=>"form-control", "id"=>"address"]) !!}
                    @error('address')
                    <strong>{{ $message }}</strong>
                    @enderror
              </div>
          </div>
      </div>
       
          <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="description">Hotel description</label>
                   {!! Form::text('description',null, ["placeholder"=>"Enter hotel description","class"=>"form-control", "id"=>"description"]) !!}
                      @error('description')
                      <strong>{{ $message }}</strong>
                      @enderror
                </div>
             </div>
             <div class="col-sm-6">
                <div class="form-group">
                   <label for="feature_image">Feature Image</label>
                   {!! Form::file('feature_image',["placeholder"=>"Enter hotel image 1","class"=>"form-control", "id"=>"feature_image"]) !!}
                   @error('feature_image')
                   <strong>{{ $message }}</strong>
                   @enderror
                   <img src="{{asset('hotels/'.$hotelier->feature_image)}}" alt="Feature Image" width="100">
                 </div>
           </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                   <label for="img">Images <small>Please select multiple image with help of ctrl </small> </label>
                   {!! Form::file('img[]',["placeholder"=>"Enter hotel image 1","class"=>"form-control", "id"=>"img", "multiple"=>"true"]) !!}
                   @error('img.*')
                   <strong>{{ $message }}</strong>
                   @enderror
                 </div>
           </div>
            <div class="col-sm-6">
                <div class="form-group">
                  <label for="description">Hotel Sequence</label>
                   {!! Form::text('sequence',null, ["placeholder"=>"Enter hotel sequence","class"=>"form-control"]) !!}
                      @error('sequence')
                      <strong>{{ $message }}</strong>
                      @enderror
                </div>
             </div>
        </div>
        <div class="row mt-4">
            <h4>Images</h4>
            @foreach ($hotelier->images as $image)
                <div class="col-sm-3 mb-3">
                    <img src="{{asset('hotels/'.$image)}}" alt="Hotel Image" width="300">
                </div>
            @endforeach
        </div>
    </div>
</div>
 <div class="row">
    <div class="col-sm-11"></div>
    <div class="col-sm-1">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
     
      
{!! Form::close() !!}
@endsection