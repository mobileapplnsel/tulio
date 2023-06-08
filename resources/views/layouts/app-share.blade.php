<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5CZ3J2C');</script>
    <!-- End Google Tag Manager -->
    
    <!-- Google tag (gtag.js) -->
    {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-94MTJMYXL8"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-94MTJMYXL8');
    </script> --}}
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="shortcut icon" href="{{ asset('images/favicon.jpg') }}">
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
        {{-- <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> --}}

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
        
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
    
    <title>Bespoke Services for Curtains & Blinds since 1990. Tulio's textile solutions are design-led & made-to-measure, focusing on servicing the needs of architect & interior designers worldwide</title>
    <meta name="description" content="Bespoke Services for Curtains & Blinds since 1990. Tulio&#39;s textile solutions are design-led & made-to-measure, focusing on servicing the needs of architect & interior designers worldwide">
    <meta name="keywords" content="curtains, blinds, curtain supplier and maker, luxury curtain manufacturer, blinds manufacturer, curtain dealers, curtain supplier, blind manufacturers, curtain fabric supplier, curtain fabric manufacturers">
    

    <style>
.modal-open {
    overflow: hidden
}

.modal-open .modal {
    overflow-x: hidden;
    overflow-y: auto
}

.modal {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1050;
    display: none;
    width: 100%;
    height: 100%;
    overflow: hidden;
    outline: 0
}

.modal-dialog {
    position: relative;
    width: auto;
    margin: .5rem;
    pointer-events: none
}

.modal.fade .modal-dialog {
    transition: -webkit-transform .3s ease-out;
    transition: transform .3s ease-out;
    transition: transform .3s ease-out,-webkit-transform .3s ease-out;
    -webkit-transform: translate(0,-50px);
    transform: translate(0,-50px)
}
.modal-content{
    border-radius: 24px !important;
    padding: 10px
}
.modal-body select,.modal-body input{
    box-shadow: 0 1px 6px 0 rgb(34 34 34 / 15%);
    display: block;
    font-family: 'Montserrat';
    font-size: 16px;
    height: 48px;
    padding-left: 12px;
    padding-right: 36px;
    width: 100%;
    border-radius: 6px;
    background: #FFFFFF;
    border-color: rgba(34, 34, 34, 0.15);
    border-style: solid;
    border-width: 1px;
    color: #222222;
    text-indent: 0.01px;
    text-overflow: "";
    cursor: pointer;
}
.modal-body label{
    font-weight: 700;
    font-size: 16px;
    line-height: 40px;
    color: #000;
}

@media (prefers-reduced-motion:reduce) {
    .modal.fade .modal-dialog {
        transition: none
    }
}

.modal.show .modal-dialog {
    -webkit-transform: none;
    transform: none
}

.modal-dialog-scrollable {
    display: -ms-flexbox;
    display: flex;
    max-height: calc(100% - 1rem)
}

.modal-dialog-scrollable .modal-content {
    max-height: calc(100vh - 1rem);
    overflow: hidden
}

.modal-dialog-scrollable .modal-footer,.modal-dialog-scrollable .modal-header {
    -ms-flex-negative: 0;
    flex-shrink: 0
}

.modal-dialog-scrollable .modal-body {
    overflow-y: auto
}

.modal-dialog-centered {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: center;
    align-items: center;
    min-height: calc(100% - 1rem)
}

.modal-dialog-centered::before {
    display: block;
    height: calc(100vh - 1rem);
    content: ""
}

.modal-dialog-centered.modal-dialog-scrollable {
    -ms-flex-direction: column;
    flex-direction: column;
    -ms-flex-pack: center;
    justify-content: center;
    height: 100%
}

.modal-dialog-centered.modal-dialog-scrollable .modal-content {
    max-height: none
}

.modal-dialog-centered.modal-dialog-scrollable::before {
    content: none
}

.modal-content {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    width: 100%;
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.2);
    border-radius: .3rem;
    outline: 0
}

.modal-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1040;
    width: 100vw;
    height: 100vh;
    background-color: #000
}

.modal-backdrop.fade {
    opacity: 0
}

.modal-backdrop.show {
    opacity: .5
}

.modal-header {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: start;
    align-items: flex-start;
    -ms-flex-pack: justify;
    justify-content: space-between;
    padding: 1rem 1rem;
    border-bottom: 1px solid #dee2e6;
    border-top-left-radius: .3rem;
    border-top-right-radius: .3rem
}

.modal-header .close {
    padding: 1rem 1rem;
    margin: -1rem -1rem -1rem auto
}

.modal-title {
    margin-bottom: 0;
    line-height: 1.5
}

.modal-body {
    position: relative;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1rem
}

.modal-footer {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: center;
    align-items: center;
    -ms-flex-pack: end;
    justify-content: flex-end;
    padding: 1rem;
    border-top: 1px solid #dee2e6;
    border-bottom-right-radius: .3rem;
    border-bottom-left-radius: .3rem
}

.modal-footer>:not(:first-child) {
    margin-left: .25rem
}

.modal-footer>:not(:last-child) {
    margin-right: .25rem
}

.modal-scrollbar-measure {
    position: absolute;
    top: -9999px;
    width: 50px;
    height: 50px;
    overflow: scroll
}

@media (min-width: 576px) {
    .modal-dialog {
        max-width:500px;
        margin: 1.75rem auto
    }

    .modal-dialog-scrollable {
        max-height: calc(100% - 3.5rem)
    }

    .modal-dialog-scrollable .modal-content {
        max-height: calc(100vh - 3.5rem)
    }

    .modal-dialog-centered {
        min-height: calc(100% - 3.5rem)
    }

    .modal-dialog-centered::before {
        height: calc(100vh - 3.5rem)
    }

    .modal-sm {
        max-width: 300px
    }
}

@media (min-width: 992px) {
    .modal-lg,.modal-xl {
        max-width:800px
    }
}

@media (min-width: 1200px) {
    .modal-xl {
        max-width:1140px
    }
}

.btn-close {
    box-sizing: content-box;
    width: 1em;
    height: 1em;
    padding: 0.25em 0.25em;
    color: #000;
    background: transparent url("assets/x-btn.png") center/1em auto no-repeat !important;
    border: 0;
    border-radius: 0.25rem;
    opacity: .5;
}
.btn {
    display: inline-block;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    text-align: center;
    text-decoration: none;
    vertical-align: middle;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
    background-color: transparent;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    border-radius: 0.25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}

.btn-secondary {
    color: #fff;
    background-color: #6c757d;
    border-color: #6c757d;
}

.btn-primary {
    color: #fff;
    background-color: #0d6efd;
    border-color: #0d6efd;
}

.btn-primary:hover {
    color: #fff;
    background-color: #0b5ed7;
    border-color: #0a58ca;
}

.btn-secondary:hover {
    color: #fff;
    background-color: #5c636a;
    border-color: #565e64;
}
.btn-close:hover {
    color: #000;
    text-decoration: none;
    opacity: .75;
}
.banner-img-1{
  height: 100vh !important;
}

        /* start home banner products link */
        @media only screen and (max-width: 1023px) and (min-width: 0px)  {
            .room-details-item {
                display:none;
            }
            section.banner {
    background: #8d7c6c;
    background-image: url("assets/live/Home-Page-Banner-mobile.jpg");
    background-size: cover !important;
}
header.hasBanner select {
    color: #000 !important;
}
.mob-mod{
     display: flex;
    justify-content: center;
    align-items: center;
}
 }
        @media only screen and (min-width: 1023px)  {
        .room-details-item {
    position: relative;
    margin-bottom: 30px;
}

.bx {
    font-family: boxicons!important;
    font-size: 20px;
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


.popup-label{
    padding-top:20px;
    font-weight: 500;
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
        top: 0 !important
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
    margin: 0px 0 !important;
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
        .desktop-image img{
          cursor: pointer;
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
            /* justify-content: flex-end; */
            justify-content: flex-start;
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
            padding-top: 20px;
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
            top: 60px;
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
            width: 100%;
        }
        .header-search a{
            color: #000 !important;
        }
      .shadow-img{
        box-shadow: 0px 0px 20px 0px #d9d9d9;
    }
    </style>
    @yield('style')
    @livewireStyles
    @livewireScripts
</head>
<!-- Provide Page Name in data-title and class to use in JavaScript and SCSS files respectively -->
<body class="index">
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5CZ3J2C"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    
    <!-- Main JS -->
    <!-- Header -->
    <header id="mynav" class="navbar-fixed-top">
        
        <div class="wrapper">
            <h1>
                <div class="image-container">
                    <a href="#"><img src="{{asset('assets/logo.png')}}" style="width:140px;height:auto;" alt="Tulio" /></a>
                </div>
            </h1>
            <div class="mobile-nav-icons">
                <div class="image-container">
                    <a href="{{route('contact')}}"><img loading="lazy" src="{{asset('assets/call.svg')}}" alt="" /></a>
                </div>
            </div>

        </div>

        
        <div class="search-box">
            <div class="overlay"></div>
            <div class="search-bar">
                <div>
                    <div class="search-icon image-container">
                        <img loading="lazy" src="{{asset('assets/search-icon.svg')}}" alt="" />
                    </div>
                    <input type="text" />
                    <div class="cancel-icon image-container" id="cancel-icon">
                        <img loading="lazy" src="{{asset('assets/cancel-icon.svg')}}" alt="" />
                    </div>
                </div>
            </div>
            <!-- <div class="search-content" id="search-content">
                <ul>
                    <li>
                        <a href="product-page.html">
                            <div class="image-container">
                                <img loading="lazy" src="{{asset('assets/oliver.jpg')}}" alt="" />
                            </div>
                            <p>Oliver</p>
                        </a>
                    </li>
                    <li>
                        <div class="image-container">
                            <img loading="lazy" src="{{asset('assets/tiffany.jpg')}}" alt="" />
                        </div>
                        <p>Tiffany</p>
                    </li>
                    <li>
                        <div class="image-container">
                            <img loading="lazy" src="{{asset('assets/oceania.jpg')}}" alt="" />
                        </div>
                        <p>Oceania</p>
                    </li>
                    <li>
                        <div class="image-container">
                            <img loading="lazy" src="{{asset('assets/eritta.jpg')}}" alt="" />
                        </div>
                        <p>Eritta</p>
                    </li>
                </ul>
            </div> -->
        </div>
        <!-- g-translate js -->
        <script type="text/javascript">
        
        // store google translate's change event
        trackChange = null;
        pageDelayed = 3000;
        
        // overwrite prototype to snoop, reset after we find it (keep this right before translate init)
        Element.prototype._addEventListener = Element.prototype.addEventListener;
        Element.prototype.addEventListener = function(a,b,c) {
          reset = false;
        
          // filter out first change event
          if (a == 'change'){
            trackChange = b;
            reset = true;
          }
        
          if(c==undefined)
            c=false;
        
          this._addEventListener(a,b,c);
        
          if(!this.eventListenerList)
            this.eventListenerList = {};
        
          if(!this.eventListenerList[a])
            this.eventListenerList[a] = [];
        
          this.eventListenerList[a].push({listener:b,useCapture:c});
        
          if (reset){
            Element.prototype.addEventListener = Element.prototype._addEventListener;
          }
        };
        
        
        function googleTranslateElementInit() {
          new google.translate.TranslateElement({ pageLanguage: 'en' }, 'google_translate_element');
        
          let first = $('#google_translate_element');
          let second = $('#google_translate_element2');
        
          let nowChanging = false;
        
          // we need to let it load, since it'll be in footer a small delay shouldn't be a problem
          setTimeout(function(){
            select = first.find('select');
            // lets clone the translate select
            second.html(first.clone());
            second.find('select').val(select.val());
        
            // add our own event change
            first.find('select').on('change', function(event){
              if (nowChanging == false){
                second.find('select').val($(this).val());
              }
              return true;
            });
        
            second.find('select').on('change', function(event){
              if (nowChanging){
                return;
              }
        
              nowChanging = true;
              first.find('select').val($(this).val());
              trackChange();
        
              // give this some timeout incase changing events try to hit each other                    
              setTimeout(function(){
                nowChanging = false;
              }, 1000);
        
            });
          }, pageDelayed);
        }
        </script>
        



    </header>
    <!-- Header end -->
    @yield('content')


    
    
        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
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
        nav: false,
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

{{-- script to prevent multiple spam clicks on a button --}}
<script>
    let linkToBeOpened="";
    const buttons = document.querySelectorAll("[data-single-click]");
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener('click', function(event) {
            link = $(this).attr('href'),
            console.log("clicked:", linkToBeOpened );
            if (linkToBeOpened == link){
            event.preventDefault();
            }else{
                linkToBeOpened = link;
            }
        
    });
}
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
