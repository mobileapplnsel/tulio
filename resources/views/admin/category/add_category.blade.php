@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">
    <div class="card">
        <div class="card-header">
            <h3>Add Category </h3>
        </div>
        <div class="card-body">
            {!! Form::open(['route'=>'admin.category.store', 'method'=>'POST', 'files'=>true]) !!}
                <div class="form-group">
                    {!! Form::label('categories','Parent Category') !!}
                    {!! Form::select('parent_id',$categories,null,
                    ['class'=>'form-control','placeholder'=>'Select Categories']) !!}
                    @error('categories')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <span style="font-size:12px"> (Leave empty if creating parent category)</span>
                </div>
                
                
    
                <div class="form-group">
                    <label for="category">Category name</label>
                    {!! Form::text('category_name',null, 
                    ["placeholder"=>"Enter category name","class"=>"form-control", "id"=>"category"]) !!}
                        @error('category_name')
                        <strong>{{ $message }}</strong>
                        @enderror
                
                    
                </div>
                <div class="form-group">
                    <label for="description">Category description</label>
                    {!! Form::textarea('category_desc',null, ["placeholder"=>"Enter category description",
                    "class"=>"form-control", "id"=>"description",'rows'=>3]) !!}
                        @error('category_desc')
                        <strong>{{ $message }}</strong>
                        @enderror
                        <span style="font-size:12px"> (Max 255 characters)</span>
                </div>
                
                
                <div class="form-group">
                    <label for="productimg1">Banner Image</label>
                    {!! Form::file('image',["placeholder"=>"Enter product image 1","class"=>"form-control", "id"=>"productimg1"]) !!}
                        @error('image')
                        <strong>{{ $message }}</strong>
                        @enderror
                        <span style="font-size:12px"> (Should be a jpg or png file under 200kb 1920 x 1280 px)</span>
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                
        </div>
    </div>
</div>

@endsection
