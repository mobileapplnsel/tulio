@extends('layouts.'.(loggedin_menu()?'user':'app'))
@section('style')
<link rel="stylesheet" href="{{asset('productpagesassets/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('productpagesassets/css/plugins/magnific-popup/magnific-popup.css')}}">
<!-- Main CSS File -->
<link rel="stylesheet" href="{{asset('productpagesassets/css/style.css')}}">
<link rel="stylesheet" href="{{asset('styles/product-page.css')}}"/>
<style>
        div.scroll {
            margin:4px, 4px;
            padding:4px;
            height: 740px;
            overflow-x: hidden;
            overflow-y: auto;
            text-align:justify;
            /* Hide scrollbar for IE, Edge and Firefox */
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
            scroll-behavior: smooth;
            position:relative;

        }

        .header-search {
            top: 53px !important;
        }



         /* Hide scrollbar for Chrome, Safari and Opera */
        div.scroll::-webkit-scrollbar {
            display: none;
        }


        div {
            scroll-behavior: smooth;
            overscroll-behavior: contain;

        }

        .page-wrapper.productDetailsPage .container .scroll {position: relative;}

        .page-wrapper.productDetailsPage .container .scroll img {position: absolute;opacity: 0;}

        .page-wrapper.productDetailsPage .container .scroll img.active {opacity: 1;}

        .text-danger {
        color: red;
        font-size: 14px;
        padding: 5px;
        }
</style>

@endsection
@section('content')
<link rel="stylesheet" href="{{asset('styles/product-page.css')}}"/>
<div class="page-wrapper productDetailsPage">
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container d-flex align-items-center">
                 <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="history.back()"><span class="back" onclick="history.back()">← &nbsp;</span> Home</a></li>
                    @if($product->category)
                    <li class="breadcrumb-item"><a href="{{route('category',$product->category)}}">{{$product->category->cat_nm}}</a></li>
                    @endif
                    <li class="breadcrumb-item active" aria-current="page">{{$product->p_cd}}</li>
                </ol>
                <div class="backToListing"><span class="back" onClick="history.back()">&#8592; &nbsp; Back</span></div>
                {{-- <nav class="product-pager ml-auto" aria-label="Product">
                    @php
                        $next_product = $category->products()->where('p_id','>',$product->p_id)->first();
                        $prev_product = $category->products()->where('p_id','<',$product->p_id)->orderBy('p_id','desc')->first();
                    @endphp
                    @if($prev_product)
                    <a class="product-pager-link product-pager-prev" href="{{route('product',[$category,$prev_product])}}" aria-label="Previous" tabindex="-1">
                        <i class="icon-angle-left"></i>
                        <span>Prev</span>
                    </a>
                    @endif
                    @if ($next_product)
                    <a class="product-pager-link product-pager-next" href="{{route('product',[$category,$next_product])}}" aria-label="Next" tabindex="-1">
                        <span>Next</span>
                        <i class="icon-angle-right"></i>
                    </a>
                    @endif
                </nav><!-- End .pager-nav --> --}}
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->



        <div class="container">
            <div class="product-details-top">
                @livewire('product-detail', compact('product','shortlist'))
            </div>
        </div>
        <div class="relatedProducts">
            <h2 style="padding-bottom: 20px;color: #333333;font-family: EB Garamond, serif;font-size: 30px; text-align:center;">Discover More</h2>
            <ul class="center-images owl-three owl-carousel owl-theme">
                @foreach ($relatedProducts->random(6) as $product)
                <li onclick="window.location.href='{{route('product',[$product])}}'" >
                    <div class="desktop-image image-container">
                        <img loading="lazy" src="{{$product->image_thumb}}" alt="" class="">
                    </div>
                    <div class="productDetails">
                            <div class="flex-box justified"><span style="font-family: 'Montserrat';
                                font-weight: 400;color:#333333" >{{$product->detail->pd_nm}}</span><span style="font-family: 'Montserrat';
    font-weight: 400;color:#333333"> 
                                

                                {{convert_currency($product->detail->pd_pr)}}
                                
                                
                                
                                </span></div>
                            <div class="colorOptioin">
                                @foreach ($product->colours as $colour)
                                <span class="colorcircle" style="background-color:#{{$colour->colour->c_no}};margin-right:10px"></span>
                                @endforeach
                            </div>
                        </div>
                </li>
                @endforeach
            </ul>
        </div>
    </main>
</div>
<script>
    function imgError(image) {
            image.onerror = "";
            image.src = "{{asset('assets/no-image.svg')}}";
            return true;
        }
</script>
@endsection
@section('script')

<script>
    $(document).ready(function(){
        $('.product-gallery.product-gallery-vertical .row div#product-zoom-gallery img').click(function(){
            var thisIndex = $(this).index();
            $('.page-wrapper.productDetailsPage .container .scroll img').removeClass('active')
            $('.page-wrapper.productDetailsPage .container .scroll img:eq('+thisIndex+')').addClass('active')
        })

    });
</script>

@endsection
