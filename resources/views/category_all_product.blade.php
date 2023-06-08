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
    font-size: 40px !important;
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

    ul.pagination {
    display: flex;
    justify-content: center !important;
    margin: 0 auto 50px;
    font-size: 14px;
    }

.pagination {
    padding-left: 0;
    list-style: none;
    border-radius: 0.25rem;
}
.sortby-select{
        margin-right: 0px !important;
    }

.description{
    width: 80%;
    margin: 0 auto;
    color: #666666;
    font-family: Montserrat, sans-serif;
    font-size: 14px !important;
    line-height: 24px !important;
    font-weight: 400;
    margin-bottom: 10px !important;
    text-align: center;
    margin-top: 20px;
}
</style>
<link rel="stylesheet" href="{{asset('styles/category-page.css')}}"/>
@endsection
@section('content')

<section  class="tulio-experience" style="padding:0px;">

<!-- <img loading="lazy" src="{{asset('assets/PRE-&-POST-login_compressed-31.jpg')}}" style="width:100%" alt=""> -->
<div class="banners top-banner-padding ">       
    <h1 class="cursive-title new-title">{{ ($technique_name == 'Borders') ? 'Bordered' : (($technique_name == 'Print') ? 'Printed' : $technique_name) }} {{empty($sub_categories->cat_nm) ? '' : $category->cat_nm}} </h1>
   
</div>
<div class="description">
    <span>{{$techniques_detail->description}}</span>
</div>
<br>
<div class="categoryBreadcumb breadcumb-wrapper sortbyfilter">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home > {{$category->cat_nm}} @if(!empty($sub_categories->cat_nm)) > {{$sub_categories->cat_nm}} @endif > <a href="javascript:void(0)"> {{ ($technique_name == 'Borders') ? 'Bordered' : (($technique_name == 'Print') ? 'Printed' : $technique_name) }} {{empty($sub_categories->cat_nm) ? '' : $category->cat_nm}}</a></li>
    </ol>

    <form id="product-filter">
        <div class="filterFormWrapper ">
            <div class="filterForm">
                    {!! Form::select('sortby',['new'=>'New Launches','price_low_to_high'=>'Price Low to High',
                    'price_high_to_low'=>'Price High To Low','name_a_to_z'=>'A-Z','name_z_to_a'=>'Z-A'],
                    request('sortby'), ['id'=>'sortby','class'=>'sortby-select','placeholder'=>'Sort By']) !!}
            </div> 
        </div>
    </form>
</div>
<br>


        <div class="dashboard">

            <section class="prodlist">
                <div id="productlist" class="column4">
                    <div class="wrapper desktop-image">
                        <ul class="center-images">
                            @foreach ($category_products as $product)
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
                        {!! $category_products->links() !!}
                        </div>
                    </div>
            </section>
        </div> 


</section>
@endsection
@section('script')
   <script>
   $(document).ready(function(){
       $("#product-filter select").on('change',function(){
         $("#product-filter").submit();
       });
   })
   </script>
@endsection