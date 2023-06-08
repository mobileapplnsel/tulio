@extends('layouts.app')
@section('content')    
<section class="banner">
    <div class="banner-image-container position-absolute">
        <img loading="lazy" class="banner-image" src="{{asset('assets/live/A+ID-Portal-Banner.jpg')}}" alt="Banner Image" />
    </div>

    

    <div class="wrapper">
        <div class="content black-content">
            <h2  style="text-align:left" id="bannerheading" style="">From manufacturing to installation,<br />we bring in efficiency with aesthetics</h2>
            <p id="bannertext"></p>
            <a data-single-click href="{{route('login')}}" class="cta-button">Login</a>
            <br><br>
            
                <p>Not a Member ?</p>
                <a data-single-click href="{{route('register')}}" class="cta-button">Signup</a>
           
            
        </div>
    </div>
</section>

<section class="tulio-portal-desc">

    <div class="wrapper">
        <h2>Welcome to the Tulio Portal - Technology that simplifies</h2>
        <p class="text">Enabling Architects and Interior Designers to create furnishing themes for various spaces for their customers</p>
        <ul>
            <li>
                <div class="image-container shadow-img">
                    <img loading="lazy" src="{{asset('assets/live/ss-new1.jpg')}}" alt="" class="">
                </div>
                <div class="content">
                    <p class="title">Browse products</p>
                    <p class="text">Choose from 5,000 elegant product designs that combine traditional crafts with
                        modern manufacturing here on our online portal</p>
                </div>
            </li>
            <li>
                <div class="image-container shadow-img">
                    <img loading="lazy" src="{{asset('assets/live/ss-new2.jpg')}}" alt="" class="">
                </div>
                <div class="content">
                    <p class="title">Discover prices without any hassle</p>
                    <p class="text">Get the approximate value of each of our products directly after adding your
                        customisations and window sizes</p>
                </div>
            </li>
            <li>
                <div class="image-container shadow-img">
                    <img loading="lazy" src="{{asset('assets/live/ss-new3.jpg')}}" alt="" class="">
                </div>
                <div class="content">
                    <p class="title">Visualise things easily for your clients</p>
                    <p class="text">Create project boards with shortlisted products and share those with the client to help
                        them make quick decisions by visualising the products better and understanding the cost
                        implications as well</p>
                </div>
            </li>
            <li>
                <div class="image-container shadow-img">
                    <img loading="lazy" src="{{asset('assets/portal4.jpg')}}" alt="" class="">
                </div>
                <div class="content">
                    <p class="title">A very dedicated relationship manager</p>
                    <p class="text">Enjoy the service of a dedicated Relationship Manager who can
                        help you access all our services and processes. From
                        managing your projects to coordinating with the client for you be rest assured once we step in.</p>
                </div>
            </li>
        </ul>

</section>
<div class="cta-section-container">
    <section class="cta-section signup">
        <div class="overlay"></div>
        <div class="image-container">
          <img loading="lazy" src="{{asset('assets/cta-darkbg.png')}}" alt="">
        </div>
        <div class="wrapper">
            <h2>Enjoy the perks of being a privileged member of the Tulio Portal</h2>
            <a href="{{route('register')}}"><button class="cta-button">Sign Up</button></a>
        </div>
    </section>
</div>
@endsection