@extends('layouts.app')

<style>
  .wrapper .image-container img{
    height: 100%;
    object-fit: cover;
  }
  .hotelier-portfolio ul.hotel-images li .image-container, .hotelier-portfolio ul.hotel-images li a{
    height:100%
  }
  ul.owl-three.owl-carousel li.item, ul.owl-three.owl-carousel li.item img, ul.owl-three.owl-carousel li.item .image-container {height: 100%;}
  ul.owl-three.owl-carousel li.item img{
    width: auto;object-fit: cover;
  }
  ul.owl-three.owl-carousel .owl-stage {display: flex;}
</style>

@section('content')
<section class="banner">
      <div class="banner-image-container position-absolute desktop-image-container">
           <img loading="lazy" class="banner-image" src="{{asset('assets/Hotal-bannernew.jpg')}}" alt="Banner Image"/>
      </div>
      <div class="banner-image-container position-absolute mobile-image-container">
         <img loading="lazy" class="banner-image-mobile" src="{{asset('assets/mobile-hotal-bannernew.jpg')}}"alt=""/>
      </div>
      <div class="wrapper" style="text-align:right">
        <div class="content" style="text-align:left">
          <h2 id="bannerheading" style="">Explore our infrastructure and<br/>technology that aids creating scale</h2>
        </div>
      </div>
</section>

<section class="hotelier-portfolio">
        <div class="wrapper">
          <h2>Our Portfolio</h2>
          <p class="sub-title">
            We’ve serviced some well- known names, who have allowed us to showcase our capabilities
          </p>

          <ul class="hotel-images" id="ourPortfolio">
            @foreach ($hotels as $hotel)
            <li>
              <a href="{{route('hotel',$hotel)}}">
                <div class="image-container">
                <picture>
                  <source media="(max-width: 799px)" srcset="{{asset('hotels/'.$hotel->feature_image)}}">
                  <source media="(min-width: 800px)" srcset="{{asset('hotels/'.$hotel->feature_image)}}">
                  <img src="{{asset('hotels/'.$hotel->feature_image)}}" alt="">
                </picture>
                  <div class="overlay">
                    <p>{{$hotel->name}}</p>
                  </div>
                  <p class="mobile-text">{{$hotel->name}}</p>
                </div>
              </a>
            </li>

            @endforeach
          </ul>
          <p>
            We offer customised, turn key solutions, infrastructure and
            capabilities for executing large hotel projects. We are a completely
            backward integrated company and own the entire value chain from
            manufacturing to final site installations.
          </p>
        </div>
    </section>

    <section class="project-journey">

        <div class="wrapper">
          <h2> <span>The Project Journey</span> </h2>
          <div class="steps-container">
            <ul class="list">
              <li class="item">
                <p class="step">Step 1</p>
                <p class="text">Design Selection & Value Engineering</p>
              </li>

              <li class="item">
                <p class="step">Step 2</p>
                <p class="text">Site Analysis & Suggestions</p>
              </li>
              <li class="item">
                <p class="step">Step 3</p>
                <p class="text">Analyse Plans & Bill of Quantities</p>
              </li>
              <li class="item">
                <p class="step">Step 4</p>
                <p class="text">Detailed Measurements</p>
              </li>
              <li class="item">
                <p class="step">Step 5</p>
                <p class="text">Manufacturing</p>
              </li>
              <li class="item">
                <p class="step">Step 6</p>
                <p class="text">Installation</p>
              </li>
            </ul>
            <!-- <div class="left-arrow mobile-image image-container" id="step-left-arrow">
              <img loading="lazy" src="{{asset('assets/hotel-left-arrow.svg')}}" alt="" />
            </div>
            <div class="right-arrow mobile-image image-container"  id="step-right-arrow">
              <img loading="lazy" src="{{asset('assets/hotel-right-arrow.svg')}}" alt="" />
            </div> -->
          </div>
          {{-- <p>
            To know more about the process in detail you can check out our TULIO
            Experience
          </p>
          <a href="{{route('process')}}" class="cta-button outline">Explore TULIO Experience</a> --}}
            
        </div>
    </section>

    {{-- <div class="cta-section-container">
        <section class="work-together cta-section">

          <div class="overlay"></div>
          <div class="image-container">
            <img loading="lazy" src="{{asset('assets/hotel-affiliate-form-background.png')}}" alt="" />
          </div>
          <div class="content wrapper">
            <div>
              <h2>Let’s work together</h2>
              <p>
                Leave your details below, enabling our team to contact you for a
                better understaing of your requirements
              </p>
            </div>
            <form id="affiliate-form">

            <div class="fields">
                <div class="field">
                <input type="text" id="afnm" placeholder="Name*" />
                </div>
                <div class="field">
                  <input type="text" id="aforg" placeholder="Organization" />
                </div>
            </div>

            <div class="fields">
                <div class="field">
                <input type="text" id="afem" placeholder="Email Id*" />
                </div>
                <div class="field">
                <input type="text" id="afph" placeholder="Ph No*" />
                </div>
            </div>
              <button class="cta-button">Save</button>
            </form>
          </div>
        </section>
    </div> --}}
@endsection
