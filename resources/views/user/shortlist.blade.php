@extends('layouts.user')
@section('style')
<link rel="stylesheet" href="{{asset('styles/project-page.css')}}"/>

<style>
    .title.flex-box {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width:100%
    }
    .title.flex-box select {
        padding: 8px 8px;
        border: 1px solid #666666;
        background: transparent;
        color: #666666;
        font-family: Montserrat, sans-serif;
        font-size: 14px;
        cursor: pointer;
    }

    .col-md-6.width-50 {width: 50%;}
    @media (max-width: 768px) {
        .title.flex-box select {
    width: 165px !important;
    padding: 10px !important;
    margin-bottom: 20px !important;
    }

    html .prodlist .wrapper ul.center-images li .productDetails .flex-box {
    display: block;
    text-align: left !important;
}
    }
</style>

@endsection
@section('content')
<form action="{{route('designer.shortlist',request()->all())}}" id="product-filter">
<section class="fulfillment-center">
    <div class="row">
        <div class="col-md-6 width-50">

            <div class="title flex-box">
                <h2 class="cursive-title">Shortlisted products</h2>
                
            </div>

    </div>
        <div class="col-md-6">
            <div class="flex-box">
                {{-- <a href="javascript:void(0)" class="getAssiitence">GET ASSISTANCE</a> --}}
                <a href="{{route('designer.project')}}"  class="cta-button-black">Create Project Boards</a>
            </div>
        </div>
    </div>

</section>

<section class="tulio-experience" style="padding:0px;">
    <div class="wrapper filterFormWrapper">
    {{-- <p>Refine By:</p> --}}
        <div class="filterForm">
            {!! Form::select('category', $shortlist_categories,request('category'),['placeholder'=>'Select Category','class'=>'filter-select']) !!}
              
            {!! Form::select('type', ['Solid'=>'Solid','Sheer'=>'Sheer'],request('type'),['placeholder'=>'Type','class'=>'filter-select']) !!}
              
              <select wire:model="filter.technique" class="filter-select" name="technique" id="productTq">
                <option value="">Technique</option>
            @foreach($techniques as $technique)
            @if(isset($_GET['technique']))
                <option value="{{$technique->name}}" {{ ($technique->name) == $_GET['technique'] ? 'selected' : '' }}  >{{$technique->name}}</option>
            @else
            <option value="{{$technique->name}}"  >{{$technique->name}}</option>
            @endif
                @endforeach
            </select>

            <select wire:model="filter.ambience" class="filter-select" name="ambience" id="productTq">
                <option value="">Ambience</option>
            @foreach($ambiences as $ambience)
            @if(isset($_GET['ambience']))
                <option value="{{$ambience->name}}" {{ ($ambience->name) == $_GET['ambience'] ? 'selected' : '' }}  >{{$ambience->name}}</option>
            @else
            <option value="{{$ambience->name}}"  >{{$ambience->name}}</option>
            @endif
                @endforeach
            </select>

            <select wire:model="filter.design" class="filter-select" name="design" id="productTq">
                <option value="">Design</option>
            @foreach($designs as $design)
            @if(isset($_GET['design']))
                <option value="{{$design->name}}" {{ ($design->name) == $_GET['design'] ? 'selected' : '' }}  >{{$design->name}}</option>
            @else
            <option value="{{$design->name}}"  >{{$design->name}}</option>
            @endif
                @endforeach
            </select>
            <a style="font-size: 13.333px;color: #333;" class="clear-all" href="#" id="clear-button" type="button">Clear All</a>
        </div>
    </div>
</section>
</form>
<div class="deleteAlertContainer">
    <div class="deleteAlert">
        <p>This product will be permanently deleted from your shortlisted list.</p>
        <div class="flex-box">
            <a href="javascript:void(0)" class="cancel">Cancel</a>
            <a href="" class="confirm">Remove</a>
        </div>
    </div>
</div>
<section class="prodlist">
    <div id="productlist" class="column4">
        <div class="wrapper desktop-image">
              <ul class="center-images">
                  @forelse ($shortlists as $shortlist)
                  <li>
                      <div class="desktop-image image-container">
                          <div class="row">
                            <div class="col_6">
                                <div class="relative">
                                <img loading="lazy" src="{{$shortlist->product->setColor($shortlist->colour_id)->closeup_image}}" alt="" class="" />
                                <a href="{{route('designer.shortlist.destroy',$shortlist)}}" class="delete">&#10005;</a>
                                </div>
                            </div>
                            <div class="col_6">
                                <div class="productDetails">

                                    <div class="flex-box">
                                        <h2>
                                            <a href="{{route('product',[$shortlist->product])}}">{{$shortlist->product->detail->pd_nm}}</a>
                                            <span class="colorcircle" style="background-color:#{{$shortlist->colour->c_no}};margin-right:10px"></span>
                                        </h2>


                                        <div class="priceBox">
                                            <span> 
                                                {{convert_currency($shortlist->price)}} 
                                                </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                      </div>
                  </li>
                  @empty
                      <h2>No Shortlisted Products</h2>
                  @endforelse
              </ul>

        </div>
    </div>
</section>

@endsection
@section('script')
   <script>
   $(document).ready(function(){
       $("#product-filter select").on('change',function(){
         $("#product-filter").submit();
       });

       $('.delete').click(function(){
           let href = $(this).attr('href');
           $('.confirm').attr('href',href);
           $('.deleteAlertContainer').show();
           return false;
       });
       $('.cancel').click(function(){
           $('.deleteAlertContainer').hide();
       });
       $('.getAssiitence').on('click',function(){
           $.ajax({
                url:"{{route('designer.assistant')}}",
                type:'POST',
                data:{
                    _token:'{{csrf_token()}}'
                },
                success:function(data){
                    alert(data.message);
                },
                error:function(data){
                    alert('Something went wrong. Please try again later');
                }
            });
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
