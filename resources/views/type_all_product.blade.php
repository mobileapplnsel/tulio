@extends('layouts.'.(loggedin_menu()?'user':'app'))
@section('style')
<style>

.colorcircle {
    height: 20px;
    width: 20px;
    border-radius: 50%;
    display: inline-block;
    float: left;
    margin-bottom: 10px;
}

    .banners img{
        height: 300px;
    }
.new-title{
    position: absolute;
    left: 0;
    right: 0;
    text-align: center;
    color: black;
    font-family: EB Garamond, serif !important;
    font-size: 45px !important;
}
@media (max-width: 768px) {
    .banners img{
        height: auto;
    }
.new-title{
    position: inherit;
    margin: auto;
    display: table;
    padding-top: 20px;
    
}
    }
@media only screen and (max-width:770px){
        html .prodlist .wrapper ul.center-images{
            flex-wrap: nowrap;
            overflow-x: auto;
        }
        #user-menu.fixed{
            display:none;
        }
    }
</style>
@endsection
@section('content')
<section  class="fulfillment-center">
<!-- <img loading="lazy" src="{{asset('assets/PRE-&-POST-login_compressed-31.jpg')}}" style="width:100%" alt=""> -->
<div class="banners">
            
            <h1 class="cursive-title new-title">{{$category->cat_nm}}</h1>
            
</div>
<div class="description">
        <span>{{$category->cat_ds}}</span>
</div>
<br>
<div class="categoryBreadcumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home > <a href="javascript:void(0)">All {{$category->cat_nm}}</a></li>
    </ol>
</div>
<br>


        <div class="wrapper dashboard">

            <section class="prodlist">
                <div id="productlist" class="column4">
                    <div class="wrapper desktop-image">
                        <ul class="center-images">
                            @foreach ($category_products[0]->get() as $product)
                            <li>
                                <a style="all: unset;" data-single-click href="{{route('product',[$product])}}">
                                    <div class="desktop-image image-container">
                                        @php
                                            $img_alt = App\Models\ImageAlt::where('image',$product->image->image)->pluck('alt')->first();
                                        @endphp
                                        <img loading="lazy" onerror="imgError(this);" src="{{$product->closeup_image}}" alt="{{(isset($img_alt)) ? $img_alt : $product->detail->pd_nm}}" class="">
                                    </div>
                                    <div class="productDetails">
                                            <div class="flex-box">
                                                <span>{{$product->detail->pd_nm}}</span><span> 
                                                    {{convert_currency($product->detail->pd_pr)}}
                                                
                                                    </span>
                                            </div>
                                            <div class="productOption">
                                                <span style="float:left;">
                                                    @foreach ($product->colours as $colour)
                                                    <span class="colorcircle" style="background-color:#{{$colour->colour->c_no}};margin-right:10px"></span>
                                                    @endforeach
                                                </span>
                                            </div>
                                        </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>

                        </div>
                    </div>
            </section>
        </div> 


</section>
@endsection
