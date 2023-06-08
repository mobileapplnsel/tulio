@extends('layouts.app')

@section('content')
    <section class="hotel-stories">
        <span class="cursive-title">Hotel Stories</span>
        <p>
            <h1>
                @if(!empty($hotel->h1))
                    {{$hotel->h1}}
                @else
                    Hotel Curtains & Blinds for {{$hotel->name}}
                @endif
            </h1>
        </p>    
    </section>
    <section class="hotel-desc">
        <div class="wrapper">
          <p>{{$hotel->description}}</p>
        </div>
    </section>
    <section class="products showonMobile" style="padding:0px;">
        <div class="wrapper">
            <ul class="owl-three owl-carousel owl-theme" style="padding-bottom:0px">
              @foreach ($hotel->images as $image)
              <li class="item" style="">
                  <div class="image-container">
                      <!-- <img loading="lazy" src='{{asset('hotels/'.$image)}}' alt="" /> -->
                      <a href='{{asset('hotels/'.$image)}}' target="_blank"><img loading="lazy" src='{{asset('hotels/'.$image)}}' alt="" /></a>
                  </div>
              </li>                  
              @endforeach                
            </ul>
        </div>
        <div class="hotels_bottom_nav">
            @php
                $next = \App\Models\Hotel::where('id', '>', $hotel->id)->first();
                $prev = \App\Models\Hotel::where('id', '<', $hotel->id)->orderBy('id', 'desc')->first();
            @endphp
            <div class="prev_button">
                @if ($prev)
                <img loading="lazy" src="{{asset('assets/a1.png')}}" onclick="window.location.href='{{route('hotel',$prev)}}'" style="height:40px;cursor:pointer">
                @endif
            </div>
            <div class="center_button">
                <img loading="lazy" src="{{asset('assets/white-hamburger-menu.svg')}}" onclick="window.location.href='{{route('hotelier')}}#ourPortfolio'" style="text-align:center;cursor:pointer;background-color: #c4c4c4;">
            </div>
            <div class="next_button">
                @if ($next)
                <img loading="lazy" src="{{asset("assets/a2.png")}}" onclick="window.location.href='{{route('hotel',$next)}}'" style="height:40px;float:right;cursor:pointer">
                @endif
            </div>
        </div>
    </section>
<!--     
    <section class="products-mobile">
        <div class="wrapper">
            <ul class="mobile-product-slider">
              @foreach ($hotel->images as $image)
              <li class="item">
                  <div class="image-container">
                      <img loading="lazy" src='{{asset('hotels/'.$image)}}' alt="" />
                      <a href='{{asset('hotels/'.$image)}}' target="_blank"><img loading="lazy" src='{{asset('hotels/'.$image)}}' alt="" /></a>
                  </div>
              </li>                  
              @endforeach                   
            </ul>
            {{-- <div class="hotels_bottom_nav">
                <div class="prev_button"><img loading="lazy" src="assets/a1.png" style="height:40px;"></div>
                <div class="center_button"><img loading="lazy" src="assets/" style="text-align:center"></div>
                <div class="next_button"><img loading="lazy" src="assets/a2.png" style="height:40px;float:right"></div>
            </div> --}}
        </div>
    </section> -->
 @endsection