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

</style>

@endsection

@section('content')

<section  class="fulfillment-center">

<!-- <img loading="lazy" src="{{asset('assets/PRE-&-POST-login_compressed-31.jpg')}}" style="width:100%" alt=""> -->

<div class="banners">

            <img loading="lazy" width="100%" src="{{asset('uploads/'.$sub_categories->cat_img1)}}" alt="{{$sub_categories->cat_nm}}">

            <h1 class="cursive-title new-title">{{$sub_categories->cat_nm}}</h1>

            

</div>

@if($sub_categories->cat_ds == '' or $sub_categories->cat_ds !== 'NA')
    <div class="description">
            <span>{{$sub_categories->cat_ds}}</span>
    </div>
@endif


<br>

<div class="categoryBreadcumb">

    <ol class="breadcrumb">

        <li class="breadcrumb-item">Home > {{$category->cat_nm}} > <a href="javascript:void(0)">{{$sub_categories->cat_nm}}</a></li>

    </ol>

</div>



@foreach ($techniques as $technique)

    @if(count($category_products[$iterator]->get())>0)
    <div class="wrapper dashboard">

        <h2 class="product-new-title">{{ ($technique->name == 'Borders') ? 'Bordered' : (($technique->name == 'Print') ? 'Printed' : $technique->name) }}</h2>

        <section class="prodlist">
            <div id="productlist" class="column4">

            <div class="wrapper desktop-image">

                <ul class="center-images">

                    @foreach ($category_products[$iterator]->limit(4)->get() as $product)

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
                            @php
                            
                                $techniques_detail = App\Models\Design::join('designs_detail', 'designs_detail.design_id', '=', 'designs.id')->where('designs_detail.design_id',$technique->id)->where('designs_detail.cat_id',$sub_categories->cat_id)->first();                 
                            @endphp
                            @if(!empty($techniques_detail->slug))
                                    <li><a class="cta-button-black" data-single-click href="{{ route('product.all.category',['category' => $category,'subcategory' => $sub_categories->slug,'technique_slug' => $techniques_detail->slug]) }}">View all</a></li>
                            @endif
                            

                            {{-- <li><a data-single-click href="{{route('product-list')}}">View all Products</a></li> --}}

                        </ul>
                        
                    </div>

                </div>

            </div>

        </section>

    </div> 
    @endif
    @php
        $iterator++
    @endphp
    
@endforeach

</section>

@endsection

