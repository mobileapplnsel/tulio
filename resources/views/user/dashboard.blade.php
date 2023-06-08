@extends('layouts.user')
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
    left: 50%;
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
</style>
@endsection
@section('content')
<section  class="fulfillment-center">
<img loading="lazy" src="{{asset('assets/PRE-&-POST-login_compressed-31.jpg')}}" style="width:100%" alt="">

@foreach ($categories as $category)
<div class="wrapper dashboard">
    <div class="banners">
         <img loading="lazy" src="{{asset('uploads/'.$category->cat_img1)}}" alt="{{$category->cat_nm}}">
         <span class="cursive-title new-title">{{$category->cat_nm}}</span>
         </div>
        

    <section class="prodlist">
        <div id="productlist" class="column4">
            <div class="wrapper desktop-image">
                <ul class="center-images">
                    @foreach ($filtered_products[$iterator]->limit(4)->get() as $product)
                   <li>
                    <a style="all: unset;" data-single-click href="{{route('product',[$product])}}">
                        <div class="desktop-image image-container">
                            <img loading="lazy" onerror="imgError(this);" src="{{$product->closeup_image}}" alt="" class="">
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
                    @php
                        $iterator++
                    @endphp
                </ul>

                    <div class="productActionBar">
                        <ul class="actions">
                            {{-- <li><a class="cta-button-black" data-single-click href="{{route('category',$category)}}">View all {{$category->cat_nm}}</a></li> --}}
                            <li><a class="cta-button-black" data-single-click href="{{ route('product.type',['category' => $category]) }}">View all {{$category->cat_nm}}</a></li>
                            {{-- <li><a data-single-click href="{{route('product-list')}}">View all Products</a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>
    </section>
</div>

<style>
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

@endforeach
</section>
<!-- <div class="nedAssistence">
    <img loading="lazy" src="{{asset('assets/need-assistance.jpg')}}" alt="">

    <div class="content">
        <h2>Need Assistance</h2>
        <a href="#" class="getInTouch">Get in Touch</a>
    </div>
</div> -->
@endsection
