<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="shortcut icon" sizes="114x114" href="{{{ asset('assets/img/ficon.png') }}}">
    <link rel="shortcut icon" href="images/favicon.jpg">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="dns-prefetch" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500;600;700;800&display=swap"
        rel="prefetch" />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="prefetch" />
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <script src="{{asset('scripts/jquery.min.js')}}"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            if($('section.banner').size() > 0 ){
                $('header').addClass('hasBanner');
            } else{
                $('header').addClass('noBanner');
            }
            $(window).scroll(function(){
                var topScroll = $(window).scrollTop();
                if(topScroll > 0){
                    $('header#mynav').addClass('fixed');
                }
                else{
                    $('header#mynav').removeClass('fixed');
                }
            })
        })

    </script>
    <link rel="stylesheet" href="{{asset('styles/vendors/owl-carousel/owl.carousel.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('styles/vendors/owl-carousel/owl.theme.default.min.css')}}"/>
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('styles/main.css')}}"/>
    <title>@yield('title','Tulio')</title>

    <style>

.banner-img-1{
  height: 100vh !important;
}

        /* start home banner products link */
        @media only screen and (max-width: 768px) and (min-width: 0px)  {
            .room-details-item {
                display:none;
            }
            section.banner {
    background: #8d7c6c;
    background-image: url("http://localhost/tulio.design/public/assets/live/Home-Page-Banner-mobile.jpg");
    background-size: cover !important;
}
header.hasBanner select {
    color: #000 !important;
}

         }
        @media only screen and (max-width: 1920px) and (min-width: 1023px)  {
        .room-details-item {
    position: relative;
    margin-bottom: 30px;
}

.bx {
    font-family: boxicons!important;
    font-weight: 400;
    font-style: normal;
    font-variant: normal;
    line-height: 1;
    text-rendering: auto;
    display: inline-block;
    text-transform: none;
    speak: none;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.bx-plus:before {
    content: "\ebc0" !important;
}
.room-details-item .room-item i {
    font-size: 17px;
    width: 30px;
    height: 30px;
    line-height: 30px;
    background-color: #fff;
    border-radius: 50px;
    color: #3e181d;
    text-align: center;
    position: relative;
}

.room-details-item .room-item .room-item-content::before {
    content: "";
    position: absolute;
    bottom: -7px;
    left: 20px;
    width: 15px;
    height: 15px;
    background-color: #fff;
    -webkit-transform: rotate(45deg);
    transform: rotate(45deg);
}
.room-details-item .room-item i::after {
    content: '';
    position: absolute ;
    top: 0 ;
    right: 0 ;
    bottom: 0 ;
    left: 0 ;
    border-radius: 50% ;
    border: 1px solid #fff;
    -webkit-animation: ripple 1s linear 2s infinite ;
    animation: ripple 1s linear 2s infinite ;
}
.room-details-item .room-item.item1 {
    position: absolute;
    top: 30%;
    left: 25%;
    z-index: 1;
}
.room-details-item .room-item.item2 {
    position: absolute;
    top: 75%;
    left: 55%;
    z-index: 1;
}
.room-details-item .room-item.item3 {
    position: absolute;
    top: 62%;
    left: 41%;
    z-index: 1;
}
.room-details-item .room-item.item4 {
    position: absolute;
    top: 42%;
    right: 28%;
    z-index: 1;
}
.room-details-item .room-item.item5 {
    position: absolute;
    top: 57%;
    right: 21%;
    z-index: 1;
}
.room-details-item .room-item .room-item-content {
    background-color: #fff;
    position: absolute;
    padding: 10px 20px;
    text-align: center;
    top: -50px;
    left: 0;
    -webkit-transition: .7s;
    transition: .7s;
    opacity: 0;
}
.room-details-item .room-item .room-item-content h3 {
    font-size: 14px;
    font-weight: 500;
    color: #3e181d;
    margin-bottom: 0;
}
.room-details-item .room-item:hover .room-item-content {
    opacity: 1
}

.room-details-item .room-item:hover i {
    background-color: #3e181d;
    color: #fff
}

.room-details-item .room-item:hover i::after {
    border-color: #3e181d;
}
.tulio-portal-desc .wrapper ul li .content{
    margin-left: 20px;
}
 }
/* end home banner products link */
        /* g-translate css */
        body{
            top:0 !important;
        }
        .goog-logo-link {
   display:none !important;
}

.goog-te-gadget {
   color: transparent !important;
}
.goog-te-banner-frame.skiptranslate {
    display: none !important;
    } 
.goog-te-gadget .goog-te-combo {
    /* padding:4px; */
    padding-top: 6px;
    background: transparent;
    border: none;
    font-family: 'Montserrat';
    font-size: 12px;
    text-transform: uppercase;
}
.goog-te-gadget .goog-te-combo {
    margin: 0px 0 !important;
}
header.hasBanner select {
    color: #fff;
}
header.hasBanner option {
    color: #000;
}
header.hasBanner.fixed select {
    color: #6C3E44;
}
header .wrapper nav ul .search{
    padding-top: 10px !important;
}
select:focus-visible{
    outline: none !important;
}

 
        input.name {
            width: 100%;
            margin-bottom: 2%;
        }

        header {
            position: absolute;
        }

        .wrapper .image-container img {
            width: 100%;
        }

        .form-footer-home input.phone-no {
            margin-right: 2% !important;
            width: auto !important;
            float: left;
        }

        .form-footer-home input.phone-no {
            margin-right: 1% !important;
            float: left;
            width: 49% !important;
        }

        .form-footer-home input.email-id {
            margin-left: 1% !important;
            float: right;
            width: 49% !important;
        }

        .form-footer-home input {
            width: 49% !important;
        }

        header .wrapper nav {
            width: auto;

        }

        header .wrapper nav ul {
            float: none;
            justify-content: flex-end;
        }
        header .wrapper nav ul li a {
            padding-left: 15px;
        }

        ul.menu-home-desktop {
            padding: padding: 0px 0px 0px 100px;
            padding: 0px 0px 0px 100px;
            /* width:80% !important;*/
        }

        header .wrapper nav ul li {
            padding: 0px;
            margin-right: 15px !important;
        }

        .wrapper {
            padding-top: 30px;
        }

        header.hasBanner hr {
            border-bottom: 1px solid #fff;
            border-top: 0px solid #fff;
        }
        header hr{
            display:block;
            clear:both;
        }
        header .wrapper nav ul a {
            font-size: 12px;
        }

        ul.menu-home-desktop {
            float: right;
        }

        header.hasBanner:hover .wrapper a, header.hasBanner .wrapper a {
            color: #fff;
        }
        header.noBanner:hover .wrapper a, header.noBanner .wrapper a {
            color: #000;
        }
        header.noBanner{
            position:relative
        }

        a img {
            width: 25%;
            display: inline;
        }
        .header-search {
            position: absolute;
            width: 225px;
            background: white;
            top: 55px;
            right: 125px;
        }
        .header-search .input-search {
            border: 1px solid black;
            padding: 6px;
            width: 100%;
        }
        .header-search .search-result {
            min-height: 100px;
            display: flex;
        }
        .header-search .search-result a {
            display: block;
            margin: 8px;
        }
        .header-search .category , .header-search .product{
            width: 50%;
        }
        .header-search a{
            color: #000 !important;
        }
        
        
      .shadow-img{
        box-shadow: 0px 0px 10px 0px #c6c6c6;
        transition: all .5s ease-out;
    }
    .shadow-img:hover {
        transition: all .5s ease-out;
    box-shadow: 0px 0px 18px 0px #c6c6c6;
        }
    </style>
    @yield('style')
    @livewireStyles
    @livewireScripts
</head>
<!-- Provide Page Name in data-title and class to use in JavaScript and SCSS files respectively -->
<body class="index">
    <!-- Main JS -->
    <!-- Header -->
    <header id="mynav" class="navbar-fixed-top">
        <x-navbar/>
    </header>
    <!-- Header end -->
    @yield('content')
    <!-- Footer -->
    <footer>
        <div class="wrapper">
            <div class="footer-links">
                <div>
                    <div class="title">
                        <h3>Information</h3>
                        <div class="arrow-down image-container">
                            <img loading="lazy" src="{{asset('assets/footer-arrow.svg')}}" alt="" />
                        </div>
                    </div>
                    <ul class="content">
                        <li><a href="{{route('faq')}}">FAQs</a></li>
                        <li><a href="{{route('privacy-policy')}}">Privacy Policy</a></li>
                        <li><a href="{{route('terms-and-conditions')}}">Terms & Conditions</a></li>
                        <li><a href="{{route('contact')}}">Contact Us</a></li>
                    </ul>
                </div>
                <div>
                    <div class="title">
                        <h3>Discover Tulio</h3>
                        <div class="arrow-down image-container">
                            <img loading="lazy" src="{{asset('assets/footer-arrow.svg')}}" alt="" />
                        </div>
                    </div>
                    <ul class="content">
                        <li><a href="{{route('process')}}">Process</a></li>
                        <li><a href="{{route('hotelier')}}">Hotels & Contracts</a></li>
                        <li><a href="{{route('designer')}}">A+ID Portal</a></li>
                        <li><a href="{{route('about-us')}}">About Us</a></li>
                    </ul>
                </div>
                <div>
                    <div class="title">
                        <h3>Offerings</h3>
                        <div class="arrow-down image-container">
                            <img loading="lazy" src="{{asset('assets/footer-arrow.svg')}}" alt="" />
                        </div>
                    </div>
                    <ul class="content">
                        <li><a href="{{route('product-list')}}">Products</a></li>
                        <li><a href="{{route('tulio-care')}}">Tulio Care</a></li>
                    </ul>
                </div>
            </div>
            @livewire('get-in-touch')
        </div>

        <div id="whatsappIcon"><a href="https://api.whatsapp.com/send?phone=+919225555559&amp;text=Hi%20Support%20Team" target="_blank" aria-describedby="a11y-new-window-external-message" rel="null noopener">
        <svg viewBox="2619 506 120 120" xmlns="http://www.w3.org/2000/svg"><defs><style>
        .cls-1 {
            fill: #27d045;
        }

        .cls-2, .cls-5 {
            fill: none;
        }

        .cls-2 {
            stroke: #fff;
            stroke-width: 5px;
        }

        .cls-3 {
            fill: #fff;
        }

        .cls-4 {
            stroke: none;
        }
        </style></defs><g data-name="Group 36" id="Group_36" transform="translate(2300 73)"><circle class="cls-1" cx="60" cy="60" data-name="Ellipse 18" id="Ellipse_18" r="60" transform="translate(319 433)"></circle><g data-name="Group 35" id="Group_35" transform="translate(254 386)"><g data-name="Group 34" id="Group_34"><g class="cls-2" data-name="Ellipse 19" id="Ellipse_19" transform="translate(94 75)"><circle class="cls-4" cx="31.5" cy="31.5" r="31.5"></circle><circle class="cls-5" cx="31.5" cy="31.5" r="29"></circle></g><path class="cls-3" d="M1424,191l-4.6,16.3,16.9-4.7.9-5.2-11,3.5,2.9-10.5Z" data-name="Path 126" id="Path_126" transform="translate(-1325 -68)"></path><path class="cls-1" d="M1266,90c0-.1,3.5-11.7,3.5-11.7l8.4,7.9Z" data-name="Path 127" id="Path_127" transform="translate(-1165 43)"></path></g><path class="cls-3" d="M1439.3,160.6a9.4,9.4,0,0,0-3.9,6.1c-.5,3.9,1.9,7.9,1.9,7.9a50.876,50.876,0,0,0,8.6,9.8,30.181,30.181,0,0,0,9.6,5.1,11.378,11.378,0,0,0,6.4.6,9.167,9.167,0,0,0,4.8-3.2,9.851,9.851,0,0,0,.6-2.2,5.868,5.868,0,0,0,0-2c-.1-.7-7.3-4-8-3.8s-1.3,1.5-2.1,2.6-1.1,1.6-1.9,1.6-4.3-1.4-7.6-4.4a15.875,15.875,0,0,1-4.3-6s.6-.7,1.4-1.8a5.664,5.664,0,0,0,1.3-2.4c0-.5-2.8-7.6-3.5-7.9A11.852,11.852,0,0,0,1439.3,160.6Z" data-name="Path 128" id="Path_128" transform="translate(-1326.332 -68.467)"></path></g></g></svg></a></div>



    <style>
        #whatsappIcon {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            z-index: 9999;
        }

        #whatsappIcon a, #whatsappIcon svg {
            display: block;
            width: 50px;
            height: 50px;
        }


    </style>
    </footer>
    <script src="{{asset('scripts/lazyload.min.js')}}" defer></script>

    <script src="{{asset('scripts/vendors/owl-carousel/owl.carousel.min.js')}}" defer></script>
<script defer>
    $(document).ready(function(){


    $(".owl-one").owlCarousel({
      stagePadding: 260,
      loop: true,
      margin: 0,
      autoplay: true,
      slideTransition: 'linear',
      smartSpeed: 1000,
      autoplayTimeout: 3000,
      autoplayHoverPause: true,
      nav: true,
      navText: [
        "<img class='carousel-control-left carousel-control'  style='height:70px;margin-top:-70px' src='./assets/a2.png' alt=''>",
        "<img class='carousel-control-right carousel-control'  style='height:70px;margin-top:-70px' src='./assets/a1.png' alt=''>",
      ],
      dots: false,
      responsive: {
        0: {
          items: 1,
        },
        600: {
          items: 3,
        },
        1000: {
          items: 3,
        },
      },
    });
    $('.owl-two').owlCarousel({

        items:1,
        merge:true,
        loop:true,
        margin:10,
        video:true,
        videoWidth: false, // Default false; Type: Boolean/Number
        videoHeight: false,
        nav: true,
        navText: [
        "<img class='carousel-control-left carousel-control' style='height:70px;margin-top:-330px' src='./assets/a2.png' alt=''>",
        "<img class='carousel-control-right carousel-control' style='height:70px;margin-top:-330px' src='./assets/a1.png' alt=''>",
        ],
        lazyLoad:true,
        center:true,
        responsive:{
            480:{
                items:1,
            },
            600:{
                items:1,
            },
            1000: {
            items: 1,
            },
        }
    });
    $('.owl-home').owlCarousel({

items:1,
merge:true,
loop:true,
margin:10,
slideTransition: 'linear',
smartSpeed: 1000,
autoplay: true,
autoplayTimeout: 4000,
autoplayHoverPause: true,
nav: false,
dots: false,
navText: [
"<img class='carousel-control-left carousel-control' style='height:70px;margin-top:-330px' src='./assets/a2.png' alt=''>",
"<img class='carousel-control-right carousel-control' style='height:70px;margin-top:-330px' src='./assets/a1.png' alt=''>",
],
lazyLoad:true,
center:true,
responsive:{
    480:{
        items:1,
    },
    600:{
        items:1,
    },
    1000: {
    items: 1,
    },
}
});
    $(".owl-three").owlCarousel({
        loop: true,
        margin: 0,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        nav: true,
        navText: [
        "<img class='carousel-control-left carousel-control'  style='height:70px;margin-top:70px' src='./assets/a2.png' alt=''>",
        "<img class='carousel-control-right carousel-control'  style='height:70px;margin-top:70px' src='./assets/a1.png' alt=''>",
        ],
        dots: false,
        responsive: {
        0: {
        items: 1,
        },
        600: {
        items: 3,
        },
        1000: {
        items: 3,
        },
        },
    });

})

</script>

<script src="{{asset('scripts/main.js')}}" defer></script>

<script defer>
    function imgError(image) {
            image.onerror = "";
            image.src = "{{asset('assets/no-image.svg')}}";
            return true;
        }
</script>


    @yield('script')
</body>

</html>
