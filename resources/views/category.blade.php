@extends('layouts.'.(loggedin_menu()?'user':'app'))
@section('style')
<style>
    .sortby-select{
        margin-right: 0px !important;
    }
    .cat-img{
        height: 300px;
    }
    @media (max-width: 768px) {
        .cat-img{
        height: 118px;
    }
    }
    .cursive-title {
    font-size: 90px !important;
    line-height: 90px !important;
    }
    .description {
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
<section class="tulio-experience" style="padding:0px;">
    <div class="wrapper">
      <div class="container d-flex align-items-center">
          @isset($category)
          {{-- <div class="categoryBreadcumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('product-list')}}"><span class="back" onclick="history.back()">← &nbsp;</span> Product</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{$category->cat_nm}}</a></li>
              </ol>
            </div> --}}
            @endisset
        </div>
        @isset($category)
        <ul class="categoryImage">
            <li>
                <div style="position: relative;background-size: cover;width: 100%;background-image: url({{$category->image_url}});" class="image-container cat-img">
                    <div>
                        <span style="position: absolute;color: white;margin: 0 auto;right: 0;top: 50%;left: 50%;transform: translate(-50%, -50%);" class="cursive-title">{{$category->cat_nm}}</span>
                    </div>
                </div>
            </li>
        </ul>
        @if($category->cat_nm=='Rugs')
            <div class="description">
                <span>{{$category->cat_ds}}</span>
            </div>
            <br>
        @endif
            <div class="categoryBreadcumb sortbyfilter">
            @if($category->cat_nm=='Rugs')
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home > <a href="javascript:void(0)">All {{$category->cat_nm}}</a></li>
                </ol>
            @else
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"></li>
                </ol>
            @endif
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
        
        @endisset
    </div>
</section>
@if (isset($category))
<form action="{{route('category',array_merge([$category],request()->all()))}}" id="product-filter">
@else
    <form action="{{route('product-list',request()->all())}}" id="product-filter">
@endif


{{-- Do not show filter features to non logged in users --}}

@if(isset($user)) 
    <section class="tulio-experience" style="padding:0px;">
        <div class="wrapper">
            <ul style="padding-top:0px;">
                <li >
                    <div class="content" style="visibility: hidden;" >
                        
                    </div>

                    <div class="sortingdiv">

                        <span style="margin-right:34px;color:#333">
                            @php
                                $start = ($products->currentPage()-1)*$products->perPage()+1;
                                $end = ($products->currentPage()-1)*$products->perPage()+$products->perPage()
                            @endphp
                            {{$start}} - {{$end<$products->total()?$end:$products->total()}} of {{$products->total()}}
                        </span>

                        @if (isset($category))
                        <span class="changeColumn">
                        <img loading="lazy" src="{{asset('assets/column4.svg')}}" alt="" class="setColumn" data-rel="column4" />
            
                        <img loading="lazy" src="{{asset('assets/column3.svg')}}" alt="" class="setColumn" data-rel="column3" />

                        <img loading="lazy" src="{{asset('assets/column2.png')}}" alt="" class="setColumn" style="margin-right:0px" data-rel="column2" />
                            </span>
                    
                        @else
                        <span class="changeColumn">
                        <img loading="lazy" onerror="imgError(this);" src="{{asset('assets/column4.svg')}}" alt="" class="setColumn" data-rel="column4" />
                        <img loading="lazy" onerror="imgError(this);" src="{{asset('assets/column3.svg')}}" alt="" class="setColumn" data-rel="column3" />
                        <img loading="lazy" onerror="imgError(this);" src="{{asset('assets/column2.png')}}" alt="" class="setColumn" data-rel="column2" />
                            </span>
                        @endif

                        

                    </div>
                </li>
            </ul>
        </div>
    </section>
@endif
{{-- @endif --}}


</form>
<section class="prodlist">
    <div id="productlist" class="column2">
        <div class="wrapper desktop-image">
              <ul class="center-images">
                  @foreach ($products as $product)

                  {{-- Open popup if user is not logged in  --}}
                  @if(! isset($user) && $products->currentPage()>2)
                  <li data-bs-toggle="modal" data-bs-target="#promoteModal">
                  @else
                  <li>
                    <a style="all: unset;" data-single-click href="{{route('product',[$product])}}">
                  @endif

                          <div class="desktop-image image-container">
                              <img loading="lazy" src="{{$product->image_url}}" alt="" class="" />

                          </div>
                          <div class="productDetails">
                                  <div class="flex-box">
                                      <span>{{optional($product->detail)->pd_nm}}</span><span>
                                                                             
                                    {{-- check if the user is logged in --}}
                                    @if(isset($user))


                                    {{convert_currency($product->detail->pd_pr)}}


                                    {{-- if not logged in show prices of only first two pages --}}
                                    @else

                                    @if( $products->currentPage()<=2)

                                    {{convert_currency($product->detail->pd_pr)}}
                                    
                                    @endif

                                    @endif


                                        </span>
                                  </div>
                                  @if (optional($product->detail)->colours->count())
                                  <div class="productOption">
                                      <span style="float:left;">
                                          @foreach ($product->colours as $colour)
                                          <span class="colorcircle" style="background-color:#{{optional($colour->colour)->c_no}};margin-right:10px"></span>
                                          @endforeach
                                      </span>
                                  </div>
                                  @endif
                              </div>
                              @if(! isset($user) && $products->currentPage()>2)
                              @else
                            </a>
                              @endif

                      </li>
                  @endforeach
              </ul>
              {!! $products->links() !!}
        </div>
    </div>
</section>
@endsection
@section('script')
   <script>
   $(document).ready(function(){

        $('#productlist').removeClass('column3').removeClass('column4').addClass('column2');
        
        var value = "; " + document.cookie;
        var parts = value.split("; " + 'column' + "=");
        var checkColumnFromSession = parts.pop().split(";").shift();

        

        if(checkColumnFromSession == "column3"){
            $('#productlist').removeClass('column4').removeClass('column2').addClass('column3');
        } else if(checkColumnFromSession == "column4"){
            $('#productlist').removeClass('column3').removeClass('column2').addClass('column4');
        }else{
            $('#productlist').removeClass('column3').removeClass('column4').addClass('column2');
        }

       $('.setColumn').click(function(){
           var checkColumn = $(this).attr('data-rel');
        console.log(checkColumn);

           if(checkColumn == "column3"){
               $('#productlist').removeClass('column4').removeClass('column2').addClass('column3');
               document.cookie = "column=column3;expires=Fri, 31 Dec 2999 23:59:59 GMT;path='/';";
           } 
           else if(checkColumn == "column4"){
            $('#productlist').removeClass('column2').removeClass('column3').addClass('column4');
            document.cookie = "column=column4;expires=Fri, 31 Dec 2999 23:59:59 GMT;path='/';";
           }else{
            $('#productlist').removeClass('column3').removeClass('column4').addClass('column2');
            document.cookie = "column=column2;expires=Fri, 31 Dec 2999 23:59:59 GMT;path='/';"; 
           }
       })

       $("#product-filter select").on('change',function(){
         $("#product-filter").submit();
       });
   })
   
   var clearButton = document.getElementById('clear-button');
   clearButton.addEventListener('click', resetForm);

   function resetForm(event){
    event.preventDefault()
    window.location.search="";
    }
   </script>
@endsection
