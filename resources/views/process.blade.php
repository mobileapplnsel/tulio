@extends('layouts.app')

@section('style')

<style>
    html .fulfillment-center .wrapper ul.center-address .contact-details .contact-1, html .fulfillment-center .wrapper ul.center-address .contact-details .contact-2 {
        display: block;
        width: 100%;
    }
    .fulfillment-center .wrapper ul.center-address .address{
        width:100%;
    }

    .fulfillment-center .wrapper ul.center-address .contact-details {
        display: block;
    }

    .fulfillment-center .wrapper ul.center-address li {
        padding: 60px 10px 0;
    }

    .fulfillment-center .wrapper ul.center-address h2 {
        padding-bottom: 10px;
    }
    .teamsp {text-align: center;}

    .fulfillment-center .wrapper .teams p {text-align: center;}

    .fulfillment-center .wrapper .teams h2, .fulfillment-center .wrapper .teams h4 {text-align: center;    padding-bottom: 20px;}

    .fulfillment-center .wrapper .teams .span_4 {width: 33.33%;}

    .fulfillment-center .wrapper .teams .row {display: flex;column-gap: 100px;margin-top: 50px;}

    .fulfillment-center .wrapper .teams h4 {margin-bottom: 14px;font-weight: 600;color: #333}
    section.fulfillment-center.teams, section.fulfillment-center.processPage {padding-top: 0px !important;}

    section.fulfillment-center.processPage .wrapper ul.center-address h2, section.fulfillment-center.processPage .wrapper ul.center-address *, section.fulfillment-center.processPage .wrapper ul.center-address div div:first-of-type {text-align: center;}

    html .fulfillment-center .wrapper ul.center-address .contact-details .contact-1, html .fulfillment-center .wrapper ul.center-address .contact-details .contact-2 {text-align: center;}

    section.fulfillment-center.processPage .wrapper ul.center-address h2 {font-size: 28px;}
    section.banner .content {}

    section.banner .wrapper {width: 88.9%;}
    @media only screen and (max-width: 770px){
html .tulio-experience .wrapper {
    padding-top: 40px;
}
}
</style>
@endsection

@section('content')
<section class="banner">
    <div class="banner-image-container position-absolute desktop-image-container">
        <img class="banner-image" src="{{asset('assets/live/Process-PAge-Banner.jpg')}}" alt="Banner Image" />
    </div>
    <div class="banner-image-container position-absolute mobile-image-container">
        <img class="banner-image-mobile" src="{{asset('assets/live/Process-PAge-Banner-mobile.jpg')}}" alt="" />
    </div>
    <div class="wrapper" style="">
        <div class="content" style="">
            <h2 id="bannerheading" style="text-align:left">An experience designed <br /> to aid you better!</h2>
        </div>
    </div>
</section>
<!-- Tulio Inspires / Experience-->
<section class="tulio-experience">
    <!-- Working with end-->

    <div class="wrapper">
        <span class="cursive-title">Tulio Experience</span>
        <p class="sub-title">
            An immersive experience to ensure perfect product and service delivery without hassles </p>
    </div>

    <div class="wrapper displayBlock">
        <ul>
            <li>
                <div class="image-container">
                    <img loading="lazy" src="{{asset('assets/project-brief.png')}}" alt="" class="" style="width:630px" />
                </div>
                <div class="content">
                    <p class="step"><span class="bold">Step 1</span>Product Selection</p>
                    <p class="text">Browse through our digital product library to select design appropriate products for your space. Our physical products can be experienced at our studios across various locations.</p>
                </div>
            </li>
            <li>
                <div class="image-container">
                    <img loading="lazy" src="{{asset('assets/site-visit.png')}}" alt="" class="" style="width:630px" />
                </div>
                <div class="content">
                    <p class="step"><span class="bold">Step 2</span>Site Visit</p>
                    <p class="text">Our Project Managers and Designers visit the site for measurements and technical
                        evaluation. Details like sizes of pelmets and coves, electric points in case of motorisation, the
                        direction of sunlight and overall aesthetics are taken into account before product selection.</p>
                </div>
            </li>
            <li>
                <div class="image-container">
                    <img loading="lazy" src="{{asset('assets/manufacturing.png')}}" alt="" class="" style="width:630px" />
                </div>
                <div class="content">
                    <p class="step"><span class="bold">Step 3</span>Manufacturing</p>
                    <p class="text">Combining traditional crafts with modern manufacturing is what we do best. Whether
                        it is handcrafted zardozi techniques or modern machine embroideries, we seamlessly coalesce them
                        into your curtains and blinds. We have in place set standards for manufacturing that ensure a
                        well-formed and perfectly finished product.</p>
                </div>
            </li>
            <li>
                <div class="image-container">
                    <img loading="lazy" src="{{asset('assets/installation.png')}}" alt="" class="" style="width:630px" />
                </div>
                <div class="content">
                    <p class="step"><span class="bold">Step 4</span>Installation</p>
                    <p class="text">Installations for curtain hardware like rails, rods and motors as well as curtains
                        and blinds are done at appropriate times based on how the site progresses. Curtains and
                        blinds are hung, ironed, bandaged, and beds are dressed, all in time for the house warming.</p>
                </div>
            </li>
            <li>
                <div class="image-container">
                    <img loading="lazy" src="{{asset('assets/product-selection.png')}}" alt="" class="" style="width:630px" />
                </div>
                <div class="content">
                    <p class="step"><span class="bold">Step 5</span>Tulio Care</p>
                    <p class="text">Precise preventive care packages for your valuable curtains and blinds to ensure longevity and aesthetic. More details on the <a style="color: #333;"href="/tulio-care">Tulio Care page</a></p>
                </div>
            </li>
        </ul>
    </div>
</section>
<section class="fulfillment-center teams">


    <div class="wrapper">
        <div class="teams">
            <div class="container">
                <h2>The Team</h2>
                <p>Get to know the team that will be with you every step of the way </p>
                <div class="row">
                    <div class="col span_4">
                        <h4>The Relationship Manager</h4>
                        <p>To ensure that your journey with Tulio is <br>smooth sailing, your Relationship<br> Manager oversees the entire process and <br>ensures there are no hiccups </p>
                    </div>
                    <div class="col span_4">
                        <h4>The Design Lead</h4>
                        <p>The Design Lead works relentlessly to <br>deliver on the vision you have for your <br>home. Suggesting the right products and <br>even customizing, our designers ensure a<br> beautiful outcome. </p>
                    </div>
                    <div class="col span_4">
                        <h4>The Project Manager</h4>
                        <p>Your Project Manager processes your <br>order and steers on-site execution like<br> measurements and installations. They <br>ensure that your project is completed up<br> to standard and on time.  </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <div class="cta-section-container">
        <section class="cta-section bringing-premium">
            <div class="overlay"></div>
            <div class="image-container">
                <img loading="lazy"  src="{{asset('assets/live/Tulio-care-CTA.jpg')}}" alt="" />
            </div>
            <div class="wrapper">
                <h2>Experience our Products</h2>
                <a href="{{route('product-list')}}" class="cta-button">View Products</a>
            </div>
        </section>
    </div>


@endsection
