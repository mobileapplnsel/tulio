@extends('layouts.app')

@section('content')
<script>
    function imgError(image) {
            image.onerror = "";
            image.src = "{{asset('assets/no-image.svg')}}";
            return true;
        }
</script>
<style>
    section.banner .banner-image-container:after {
    background: rgb(0 0 0 / 0%);
}
</style>
<!-- Banner -->
<section class="banner">
    <div class="owl-home owl-carousel owl-theme">
    <li class="item">
    <div class="banner-image-container position-absolute mainBanner">
    <div class="room-details-item">
    <picture>
            <source  media="(max-width: 1024px)" srcset="{{asset('assets/live/Home-Page-Banner.jpg')}}">
    </picture>
    <img  class="banner-img-1" src="{{asset('assets/live/Home-Page-Banner.jpg')}}">
            
<a href="solid-curtains" target="_blank">
    <div class="room-item item1">
<i class="bx bx-plus"></i>
<div class="room-item-content">
<h3>SOLID CURTAINS</h3>
</div>
</div>
</a>


<a href="sheer-curtains" target="_blank"><div class="room-item item2">
<i class="bx bx-plus"></i>
<div class="room-item-content">
<h3>SHEER CURTAINS</h3>
</div>
</div></a>

<!-- <div class="wrapper">
            <div class="content">               
                <p>
                    Discover curtains that echo the unexpected textures of a landscape.
                </p>                
            </div>
        </div> -->



{{-- 
<a href="seating" target="_blank"><div class="room-item item3">
<i class="bx bx-plus"></i>
<div class="room-item-content">
<h3>SEATING</h3>
</div>
</div></a>

<a href="lamps" target="_blank"><div class="room-item item4">
<i class="bx bx-plus"></i>
 <div class="room-item-content">
 <h3>LAMPS</h3>
</div>
</div></a>

<a href="cushions" target="_blank"><div class="room-item item5">
<i class="bx bx-plus"></i>
<div class="room-item-content">
<h3>CUSHIONS</h3>
</div>
</div></a> --}}

    </div>
    </div>
    </li>

    <li class="item">
        <div class="banner-image-container position-absolute mainBanner">
        <div class="room-details-item">
        <picture>
                    <source media="(min-width: 1024px)" srcset="{{asset('assets/live/Home-Page-Banner-2.jpg')}}">
                    <source media="(max-width: 1023px)" srcset="{{asset('assets/live/Home-Page-Banner-mobile-2.jpg')}}">
                
                </picture>
                <img  class="banner-img-1" src="{{asset('assets/live/Home-Page-Banner-2.jpg')}}">
    <a href="solid-roman-blinds" target="_blank"><div class="room-item item1">
    <i class="bx bx-plus"></i>
    <div class="room-item-content">
    <h3>SOLID ROMAN BLINDS</h3>
    </div>
    </div></a>

   <!--  <div class="wrapper">
            <div class="content">                
                <p>
                    Experience the art of light and shade with blinds that blur the lines between the indoor and outdoor.
                </p>                
            </div>
        </div> -->   
    
        </div>
        </div>
        </li>

        <li class="item">
        <div class="banner-image-container position-absolute mainBanner">
        <div class="room-details-item">
        <picture>
                    <source media="(min-width: 1024px)" srcset="{{asset('assets/live/Home-Page-Banner-3.jpg')}}">
                    <source media="(max-width: 1023px)" srcset="{{asset('assets/live/Home-Page-Banner-mobile-3.jpg')}}">                
                </picture>
                <img  class="banner-img-1" src="{{asset('assets/live/Home-Page-Banner-3.jpg')}}">    

    <!-- <div class="wrapper">
            <div class="content">               
                <p>Draperies that offer a blend of fine materials and luxury craftsmanship.</p>                
            </div>
        </div> -->   
    
        </div>
        </div>
        </li>


        

    </div>
    </section>


    <section class="tulio-desc curciveSec">
        <div class="wrapper">
            <p class="cursive-title">Specialists in value added curtains & blinds<br>
            for spaces created by architects & interior designers
</p>
        <p style="text-transform:uppercase;color:#666">Technology-Enabled | Design-Led | Made-to-Measure</p>
        </div>
    </section>
    <!-- Tulio desc end -->

    <!-- Signature Products -->
    <section class="products signatureProductsec">
        <div class="wrapper">
            <h2>Our Iconic Products</h2>
            
            <ul class="owl-one owl-carousel owl-theme">
              @php
            //   $signature_products = Signature_Products::where('id',1)->first();
            $signature_products = \App\Models\Signature_Products::where('id',1)->first();
              $product_list = $signature_products->products;
              $products = \App\Models\Product::whereIn('p_cd',$product_list)->get();
              
              @endphp
              @foreach($products as $product) 
                <li class="item" onClick="window.location.href='{{route('product',[$product])}}'">
                    <div class="image-container">
                        <img loading="lazy"  onerror="imgError(this);"  alt="{{$product->p_cd}}"  src="{{$product->image_thumb}}" alt="" />
                        <img loading="lazy"  onerror="imgError(this);" alt="{{$product->p_cd}}"  src="{{$product->image_thumb}}" alt="" />
                    </div>
                    <p>{{$product->detail->pd_nm}}</p>
                </li>
                @endforeach
            </ul>

            {{-- <a href="{{route('product-list')}}" class="cta-button">View All Products</a> --}}
        </div>
    </section>

    <section class="bringing-together">
        <div class="wrapper">
            <div class="owl-two owl-carousel owl-theme">
            @foreach($sliders as $slider)
            <li class="item-video">
                <h2>{{$slider->title}}</h2>
                <br>
                    <div class="image-container">
                        <video  loading="lazy" id="video-one" controls playsinline preload="metadata" autobuffer="true" oncontextmenu="return false;" controlsList="nodownload">
                            <source loading="lazy" src="{{url('images')}}/{{$slider->photo}}#t=0.001" type="video/mp4" />
                        </video>
                    </div>
                    <?php 
                        $abbreviation   = explode(' ', trim($slider->description))[0];
                        $description    = substr(strstr($slider->description," "), 1);
                    ?>
                    <div class="text">
                        <p class="title"></p>
                        <p class="sub-text">{{$slider->description}}</p>
                        {{--<p class="sub-text"><a class="link-primary" href="{{$slider->product_link}}">{{$abbreviation}}</a>&nbsp;{{$description}}</p>--}}
                    </div>
                </li>
                @endforeach
            </div>
        </div>
    </section>
 <!-- Dynamic Slider End -->
 
  

       



    <!-- Bringing Together end -->

    <!-- Hassle Free -->
    <section class="hassle-free-experience">
        <div class="image-container">
            <picture>
                    <source media="(min-width: 1024px)" srcset="{{asset('assets/bannerbg-new.jpg')}}">
                    <source media="(max-width: 1023px)" srcset="{{asset('assets/mobile-hasslebg-new.jpg')}}">
                    <img loading="lazy"  onerror="imgError(this);"  src="{{asset('assets/bannerbg-new.jpg')}}" alt="" />                    
                </picture> 
            
        </div>
        <!-- <div class="image-container mobile-image-container">
            <img loading="lazy"  onerror="imgError(this);"  src="" alt="" />
        </div> -->
        <div class="wrapper">
            <div class="content">
                <h2>From ideation to installation</h2>
                <p>
                    Explore our one-stop portal to create your unique space.
                </p>
                <button class="cta-button" onclick="window.location.href='{{route('process')}}'">Learn More</button>
            </div>
        </div>
    </section>
    <!-- Hassle Free end-->

    <!-- Collaborating -->
    <section class="collaborating">
        <div class="wrapper">
            <div class="desktop-image image-container">
                <img loading="lazy"  onerror="imgError(this);"  src="{{asset('assets/live/iMac-Home-Page.png')}}" class="" alt="" />
            </div>
            <div class="content">
                <h2>Collaborating with Architects <br> and Interior Designers</h2>
                <p>Serve your clients better with quick calculations and digital presentations</p>

                <button class="cta-button" onclick="window.location.href='{{route('designer')}}'">Explore Tulio Portal</button>
            </div>
            <div class="computer-image mobile-image image-container">
                <img loading="lazy"  onerror="imgError(this);"  src="{{asset('assets/live/iMac-Home-Page.png')}}" class="" alt="" />
            </div>
        </div>
    </section>
    <!-- Collaborating end-->

    <!-- Working with -->
    <div class="cta-section-container">
        <section class="cta-section working-with">
            <div class="overlay"></div>
            <div class="image-container">
                <img loading="lazy"  onerror="imgError(this);"  src="{{asset('assets/live/CTA.jpg')}}" alt="" />
            </div>
            <div class="wrapper">
                <h2 style="padding-bottom:15px;">Partnering with the cream of the hospitality industry</h2>
                <p style="color: #ffffff;font-size:14px">
                    Partnering with the hospitality industry to serve you better
                </p>
                <button class="cta-button outline" onclick="window.location.href='{{route('hotelier')}}'">Explore</button>
            </div>
        </section>
    </div>

    <!-- Working with end-->

    <!-- Tulio Inspires -->
    <section class="tulio-inspires">
        <div class="wrapper">
            <p style="color:#333;" class="cursive-title">Tulio Inspires</p>
            <p>
                Come, have a look at how our customers have transformed their living spaces into something as unique as themselves!
            </p>
            <div id="instafeed-container"></div>
            <!-- <div class="videos">
                <video id="video" controls>
                    <source src="{{asset('assets/dummy-video.mp4')}}" type="video/mp4" />
                </video>
                <div class="play-btn image-container">
                    <img data-src="{{asset('assets/playbtn.svg')}}" class="lazy desktop-image" alt="" />
                </div>
            </div> -->
        </div>
    </section>
    <!-- Tulio Inspires end-->

    <!-- Bringing Premium -->
    <div class="cta-section-container">
        <section class="cta-section bringing-premium">
            <div class="overlay"></div>
            <div class="image-container">
                <img loading="lazy"  onerror="imgError(this);"  src="{{asset('assets/live/Tulio-care-CTA.jpg')}}" alt="" />
            </div>
            <div class="wrapper">
                <h2>Bringing premium care for your Curtains & Blinds</h2>
                <button class="cta-button" onclick="window.location.href='{{route('tulio-care')}}'">Explore Tulio Care Program</button>
            </div>
        </section>
    </div>

    <!-- Bringing Premium end-->
@endsection

@section('script')

@include('components.instafeed')


@endsection
