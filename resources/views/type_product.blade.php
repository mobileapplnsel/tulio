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
    h2{padding-bottom: 0px !important;}

</style>
<link rel="stylesheet" href="{{asset('styles/category-page.css')}}"/>

@endsection

@section('content')

<section  class="fulfillment-center">

<!-- <img loading="lazy" src="{{asset('uploads/'.$category->cat_img1)}}" alt="{{$category->cat_nm}}" style="width:100%"> -->

<!-- <span class="cursive-title">{{$category->cat_nm}}</span> -->
@if (isset($category))
<form action="{{route('category',array_merge([$category],request()->all()))}}" id="product-filter">
@else
    <form action="{{route('product-list',request()->all())}}" id="product-filter">
@endif

    
<div class="banners">

            <img loading="lazy" width="100%" src="{{asset('uploads/'.$category->cat_img1)}}" alt="{{$category->cat_nm}}">

            <h1 class="cursive-title new-title">{{$category->cat_nm}}</h1>

            

</div>

<div class="description">

        <span>{{$category->cat_ds}}</span>

</div>

<br>

<div class="categoryBreadcumb">

    <ol class="breadcrumb">

        <li class="breadcrumb-item">Home > <a href="javascript:void(0)">{{$category->cat_nm}}</a></li>

    </ol>

</div>



@foreach ($sub_categories as $sub_category)

@php

$sub_cat_products= App\Models\Product::with('detail.colours.colour','image')->where('cat_id',$sub_category->cat_id);

@endphp

@if(count($sub_cat_products->limit(4)->get())>0)

    <div class="wrapper dashboard">

            <h2 class="product-new-title">{{$sub_category->cat_nm}}</h2>

        <section class="prodlist">

            <div id="productlist" class="column4">

                <div class="wrapper desktop-image">

                    <ul class="center-images">

                        @foreach ($sub_cat_products->limit(4)->get() as $product)

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



                        <div class="productActionBar">

                            <ul class="actions">

                                <li><a class="cta-button-black" data-single-click href="{{ route('product.category',['category' => $category,'subcategory' => $sub_category->slug]) }}">View all {{$sub_category->cat_nm}}</a></li>

                                {{-- <li><a data-single-click href="{{route('product-list')}}">View all Products</a></li> --}}

                            </ul>

                        </div>

                    </div>

                </div>

        </section>

    </div>

@endif

@endforeach



@if(count($cat_products[0]->limit(4)->get())!=0)

    <div class="wrapper dashboard">

            <span class="product-new-title">All {{$category->cat_nm}}</span>

        <section class="prodlist">

            <div id="productlist" class="column4">

                <div class="wrapper desktop-image">

                    <ul class="center-images">

                        @foreach ($cat_products[0]->limit(4)->get() as $product)

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



                        <div class="productActionBar">

                            <ul class="actions">

                                <li><a class="cta-button-black" data-single-click href="{{route('category',$category)}}">View all {{$category->cat_nm}}</a></li>

                                {{-- <li><a class="cta-button-black" data-single-click href="{{ route('product.all.type',['cat_id' => $category->cat_id]) }}">View all {{$category->cat_nm}}</a></li> --}}

                                {{-- <li><a data-single-click href="{{route('product-list')}}">View all Products</a></li> --}}

                            </ul>

                        </div>

                    </div>

                </div>

        </section>

    </div>

@endif

<br><br>

@if($category->cat_nm=='Curtains')
<div class="accordion theme-accordion" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-title" id="">
            Why Tulio for Curtains?
        </h2>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            A legacy spanning three decades. 
        </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <p>Established as Tulips in 1990, Tulio has been crafting fine soft furnishings for over three decades to aid our Architect and Interior Designer Community. Through an ongoing dialogue with craftsmen and textile designers, who are most familiar with the techniques employed in the production of value-added curtains and blinds, Tulio’s design library takes from distinct cultures and reimagines them through unconventional techniques and masterful craftsmanship.</p>
        </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Curtains tailored for each project. 
        </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
        <p>An interweaving of yarns, textures and color brings to life a myriad of possibilities in the form of made to measure curtains. Each stitch and motif, every pattern and pleat is the result of a rich dialogue between our in-house team and our clients. </p>
        </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        A design library of artisanal drapes.
        </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse"  data-bs-parent="#accordionExample">
        <div class="accordion-body">
        <p>At Tulio, each curtain has a story and every story takes you on a journey.  We take pride in translating a vision into art through quality craftsmanship. </p>
        </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapseThree">
        From ideation to installation. 
        </button>
        </h2>
        <div id="collapsefour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
        <p>Perfect measurements are the basis of well-finished curtains. We have a ground support team across most locations and our technician conducts site surveys for accurate measurements. </p>
        </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapseThree">
        Aiding the hospitality industry.
        </button>
        </h2>
        <div id="collapse5" class="accordion-collapse collapse"  data-bs-parent="#accordionExample">
        <div class="accordion-body">
        <p>Our hotel-grade curtains can withstand commercial laundering and are made to keep fire safety, stain resistance, and housekeeping needs in mind. </p>
        </div>
        </div>
    </div>
</div>
@elseif($category->cat_nm=='Blinds')
<div class="accordion theme-accordion" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-title" id="">
            Why Tulio for Blinds?
        </h2>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            A legacy spanning three decades. 
        </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <p>Established as Tulips in 1990, Tulio has been crafting fine soft furnishings for over three decades to aid our Architect and Interior Designer Community. Through an ongoing dialogue with craftsmen and textile designers, who are most familiar with the techniques employed in the production of value-added curtains and blinds, Tulio’s design library takes from distinct cultures and reimagines them through unconventional techniques and masterful craftsmanship. </p>
        </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Careful curation of designs.
        </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
        <p>At the forefront of everything we do design. The Tulio design team is also charged with creating exclusive embroideries and prints to sit alongside its patterns and textured weaves. Scouring all four corners of the globe, their keen eye takes in a range of eclectic influences to ensure each design represents the finest in contemporary Roman Blinds. </p>
        </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            An eye for detail.
        </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse"  data-bs-parent="#accordionExample">
        <div class="accordion-body">
        <p>At Tulio, care and attention to detail don’t simply stop once we’ve selected the perfect fabric. Next, we turn our attention inwards to the finer details. We understand the importance of finishing touches to the discerning customer. Thus, in order to preserve the traditions of the Roman Blind, each and every inclination of the needle is backed with intention and each Blind has a sense of individuality as well as an elegant finish. </p>
        </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapseThree">
            Finished with a flourish.
        </button>
        </h2>
        <div id="collapsefour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
        <p>A Tulio Roman blind is the result of meticulous attention to detail, combining various components to create a flawless, visually appealing product. In ancient times, a damp cloth was all that separated homes from the outside world. Fortunately, modern homeowners have access to more refined options, and Tulio's collection strives to be at the forefront of meeting those needs. </p>
        </div>
        </div>
    </div>
</div>
@endif

<br><br><br>

</section>

@endsection

