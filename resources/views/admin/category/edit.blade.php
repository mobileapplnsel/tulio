@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">
    <div class="card">
        <div class="card-header">
            <h3>Edit Category </h3>
        </div>
        <div class="card-body">
            {!! Form::model($category,['route'=>['admin.category.update',$category->cat_id], 'method'=>'PUT', 'files'=>true]) !!}
                <div class="form-group">
                    {!! Form::label('categories','Parent Category') !!}
                    {!! Form::select('parent_id',$categories,null,
                    ['class'=>'form-control','placeholder'=>'Select Categories']) !!}
                    @error('categories')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label for="category">Category name</label>
                    {!! Form::textarea('category_name',$category->cat_nm, 
                    ["placeholder"=>"Enter category name","class"=>"form-control", "id"=>"category",'rows'=>3]) !!}
                        @error('category_name')
                        <strong>{{ $message }}</strong>
                        @enderror
                
                    
                </div>
                <div class="form-group">
                    <label for="productCode">Category description</label>
                    {!! Form::text('category_desc',$category->cat_ds, ["placeholder"=>"Enter category description","class"=>"form-control", "id"=>"productCode"]) !!}
                        @error('category_desc')
                        <strong>{{ $message }}</strong>
                        @enderror
                </div>
                
                <div class="form-group">
                    <label for="productimg1">Banner Image</label>
                    {!! Form::file('image',["placeholder"=>"Enter product image 1","class"=>"form-control", "id"=>"productimg1"]) !!}
                    @error('cat_img1')
                    <strong>{{ $message }}</strong>
                    @enderror
                    <img src="{{$category->image_url}}" width="150"/>
                
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
        </div>
    </div>
</div>
@endsection
