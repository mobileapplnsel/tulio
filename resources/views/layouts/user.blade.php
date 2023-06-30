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
    <?php $randno = rand(10, 600); ?>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="facebook-domain-verification" content="y90yuxbctj8jej75r0h4sy0m8y2r8b" />
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="{{asset('scripts/jquery.min.js')}}"></script>
        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

        <script type="text/javascript">
        $(document).ready(function(){
            $('.pluscontent').hide();
            
            $(document).on('click','.submenu',function(){
                    $(this).addClass("visible-submenu");
                    $(this).next().show();        
            });
            
            $(document).on('click','.visible-submenu',function(){
                    $(this).next().hide(); 
                    $(this).removeClass("visible-submenu");
            });
        
            $(document).on('click','.fa-plus',function(){
                    $(this).removeClass("fa-plus");
                    $(this).addClass("fa-minus");
                    $(this).next().show();        
            });

            $(document).on('click','.fa-minus',function(){
                $(this).next().hide(); 
                $(this).removeClass("fa-minus");
                    $(this).addClass("fa-plus");       
            });

            if($('section.banner').size() > 0 ){
                $('header').addClass('hasBanner');
            } else{
                $('header').addClass('noBanner');
            }
            $(document).on('click', '.formPoup span.closePop', function(){
                $(document).find('.formPoup').fadeOut();
            });
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
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('styles/vendors/owl-carousel/owl.carousel.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('styles/vendors/owl-carousel/owl.theme.default.min.css')}}"/>
    <!-- Main CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('styles/main.css?id='.$randno.'')}}"/>
    <link rel="stylesheet" href="{{asset('styles/loggedin.css?id='.$randno.'')}}"/>
    <link rel="stylesheet" href="{{asset('css/intlTelInput.css?id='.$randno.'')}}">  
    <script src="{{asset('js/intlTelInput.min.js?id='.$randno.'')}}"></script>
    
    <title>{{ $title ?? "Project Management Tool for Architects & Interior Designers | Tulio" }}</title>
    <meta name="description" content="{{ $description ?? 'A soft furnishings selection and project management tool for Architects & Interior Designers which helps product selection, price discovery, project board creation and client servicing'}}">
    <meta name="keywords" content="{{$keywords ?? 'Curtain selection portal, curtain selection platform, curtain selection software, soft-furnishings selection portal, soft-furnishings project software, Interior design project management, Interior design project management services, Interior design project management software'}}">

   <style>

.cat-img {
    margin-top: 60px;
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


        .iti--allow-dropdown {
            width: 100%;
        }

        #error-msg4 {
            color: red !important;
            margin-bottom: 12px;
            margin-top: -12px;
        }

        #valid-msg4 {
            color: green !important;
            margin-bottom: 12px;
            margin-top: -12px;
        }

        .hide {
    display: none;
}

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
.modal-body select{
    box-shadow: 0 1px 6px 0 rgb(34 34 34 / 15%);
    display: block;
    font-family: 'Montserrat';
    font-size: 14px;
    height: 48px;
    padding-left: 12px;
    padding-right: 36px;
    width: 100%;
    border-radius: 6px;
    background: #FFFFFF;
    border-color: rgba(34, 34, 34, 0.15);
    border-style: solid;
    border-width: 1px;
    color: #333;
    text-indent: 0.01px;
    text-overflow: "";
    cursor: pointer;
}
.modal-body label{
    font-weight: 200;
    font-size: 18px;
    line-height: 40px;
    color: #333;
    font-family: EB Garamond, serif;
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
    color:#333;
    font-size: 16px;
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
@media only screen and (max-width: 1150px) and (min-width: 0px)  {
    .mob-mod{
    padding-top: 0;
    display: flex !important;
    align-items: center !important;
    justify-items: center !important;
    flex-direction: column !important;
}
.space{
    margin-bottom: 12px;
}
.bx {
    font-size: 20px;
}
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
    background: transparent url("../assets/x-btn.png") center/1em auto no-repeat !important;
    border: 0;
    border-radius: 0.25rem;
    opacity: .5;
    cursor: pointer;
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
    padding: 8px 20px;
    border: 1px solid #666666;
    background: transparent;
    color: #666666;
    font-family: Montserrat, sans-serif;
    font-size: 14px;
    -webkit-transition: all 0.2s;
    transition: all 0.2s;
    outline: none;
}

.btn-primary {
    padding: 8px 20px;
    border: 1px solid #666666;
    background: #333;
    color: #fff;
    font-family: Montserrat, sans-serif;
    font-size: 14px;
    -webkit-transition: all 0.2s;
    transition: all 0.2s;
    outline: none;
}

.btn-primary:hover {
    -webkit-transform: scale(1.01);
        transform: scale(1.01);
}

.btn-secondary:hover {
    -webkit-transform: scale(1.01);
        transform: scale(1.01);
        font-weight: 500;
}

.btn-close:hover {
    color: #000;
    text-decoration: none;
    opacity: .75;
}
.banner-img-1{
  height: 100vh !important;
}

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
        .toggleContent{
            display:none
        }
        input.name {
            width: 100%;
            margin-bottom: 2%;
        }

        header {
            position: absolute;
        }

        .desktop-image .image-container{
          cursor: pointer;
        }
        
        .wrapper .image-container img {
            width: 100%;
        }

        .form-footer-home input.phone-no {
            margin-right: 2% !important;
            width: 100% !important;
            padding: 8px 20px;
            float: left;
        }


        /* .form-footer-home input.phone-no {
            margin-right: 1% !important;
            float: left;
            width: 49% !important;
        } */

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
            padding:4px 0px !important;
            margin-right: 15px !important;
        }
        html header.noBanner .wrapper nav ul {
            margin: -6px !important;
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
            top: 49px;
            right: 125px;
            z-index: 99999;
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
    </style>
    @yield('style')
    @livewireStyles
    
    
    

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
    @include('components.navbar-user')   
    </header>
    <div class="phoneInfo">
    @if (request()->is('product*')||request()->is('designer/shortlist')||request()->route()->getName()=='category')

    @if(isset($user))
    <p>For any type of assistance you can contact your RM {{$user->poc_name}} at <a href="tel:{{$user->poc_number}}"><svg height="32px" id="Layer_1" style="enable-background:new 0 0 32 32;" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g transform="translate(96 384)"><path d="M-65.224-359.142l-0.147-0.445c-0.353-1.045-1.504-2.135-2.563-2.422l-3.918-1.07c-1.063-0.289-2.578,0.1-3.354,0.877   l-1.418,1.418c-5.153-1.393-9.194-5.434-10.586-10.586l1.418-1.418c0.777-0.777,1.166-2.291,0.878-3.354l-1.068-3.92   c-0.289-1.063-1.381-2.214-2.424-2.563l-0.447-0.15c-1.045-0.348-2.535,0.004-3.313,0.781l-2.12,2.123   c-0.38,0.377-0.621,1.455-0.621,1.459c-0.074,6.734,2.565,13.225,7.33,17.986c4.752,4.752,11.216,7.389,17.931,7.332   c0.035,0,1.145-0.238,1.523-0.615l2.12-2.121C-65.228-356.604-64.875-358.097-65.224-359.142L-65.224-359.142z"/></g></svg> {{$user->poc_number}}</a></p>
    @else
    <p>For any type of assistance you can contact your RM Tania Guha at <a href="tel:+91 92255 55559"><svg height="32px" id="Layer_1" style="enable-background:new 0 0 32 32;" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g transform="translate(96 384)"><path d="M-65.224-359.142l-0.147-0.445c-0.353-1.045-1.504-2.135-2.563-2.422l-3.918-1.07c-1.063-0.289-2.578,0.1-3.354,0.877   l-1.418,1.418c-5.153-1.393-9.194-5.434-10.586-10.586l1.418-1.418c0.777-0.777,1.166-2.291,0.878-3.354l-1.068-3.92   c-0.289-1.063-1.381-2.214-2.424-2.563l-0.447-0.15c-1.045-0.348-2.535,0.004-3.313,0.781l-2.12,2.123   c-0.38,0.377-0.621,1.455-0.621,1.459c-0.074,6.734,2.565,13.225,7.33,17.986c4.752,4.752,11.216,7.389,17.931,7.332   c0.035,0,1.145-0.238,1.523-0.615l2.12-2.121C-65.228-356.604-64.875-358.097-65.224-359.142L-65.224-359.142z"/></g></svg> +91 92255 55559</a></p>
    @endif
    
    @endif

</div>
    <!-- Header end -->
    @yield('content')
    <!-- Footer -->
    <footer>
        <div class="wrapper">
            <div class="footer-links">
                <div>
                    <div class="title">
                        <h3>FIND US ON</h3>
                        <div class="arrow-down image-container">
                            <img loading="lazy" src="{{asset('assets/footer-arrow.svg')}}" alt="" />
                        </div>
                    </div>
                    <span class="space social-part" style="cursor: pointer;"><a style="color: #888" target="_blank" href="https://in.linkedin.com/company/tulio-pvt-ltd"><i class='bx bxl-linkedin' ></i></a>&nbsp;<a target="_blank" style="color: #888" href="https://www.facebook.com/profile.php?id=100064118888869"><i class='bx bxl-facebook' ></i></a>&nbsp;<a target="_blank" style="color: #888" href="https://www.instagram.com/officialtuliodesign/"><i class='bx bxl-instagram'></i></a>&nbsp;<a target="_blank" style="color: #888" href="https://in.pinterest.com/officialtuliodesign/"><i class='bx bxl-pinterest-alt' ></i></a></span>
                </div>
                <div>
                    <div class="title">
                        <h3>ABOUT US</h3>
                        <div class="arrow-down image-container">
                            <img loading="lazy" src="{{asset('assets/footer-arrow.svg')}}" alt="" />
                        </div>
                    </div>
                    <ul class="content">
                        <li><a class="category_menu"  data-single-click href="{{route('process')}}">Our Process</a></li>
                        <li><a class="category_menu"  data-single-click href="">Behind the Curtain</a></li>
                    </ul>
                </div>
                
                <div>
                    <div class="title">
                        <h3>PRODUCTS</h3>
                        <div class="arrow-down image-container">
                            <img loading="lazy" src="{{asset('assets/footer-arrow.svg')}}" alt="" />
                        </div>
                    </div>
                    <ul class="content">
                        @php
                            $categories = App\Models\Category::findMany([1, 10, 17]);
                        @endphp
                         @foreach ($categories as $category)
                        <li>
                            <!--<a class="category_menu"  data-single-click href="{{ route('product.type',['category' => $category]) }}">{{$category->cat_nm}} </a><i class="fa fa-plus" style="font-size:12px;"></i>-->
                            <a class="category_menu submenu" @if($category->cat_nm==='Rugs') data-single-click href="{{ route('category',$category) }}" @endif >{{$category->cat_nm==='Blinds' ? 'Roman Blinds' : $category->cat_nm}} </a>
                            @if($category->cat_nm !='Rugs')
                                @if ($category->children->count())
                                <ul class="pluscontent submenu">
                                    @foreach ($category->children->take(2)  as $child)
                                    <li><a data-single-click href="{{ route('product.category',['category' => $category,'subcategory' => $child->slug]) }}">{{$child->cat_nm}}</a></li>
                                    @endforeach
                                </ul>
                                @endif
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>
                
                
                <div>
                    <div class="title">
                        <h3>SERVICES</h3>
                        <div class="arrow-down image-container">
                            <img loading="lazy" src="{{asset('assets/footer-arrow.svg')}}" alt="" />
                        </div>
                    </div>
                    <ul class="content">
                        <li><a class="category_menu"  data-single-click href="{{route('designer')}}">A+ID Portal</a></li>
                        <li><a class="category_menu"  data-single-click href="{{route('hotelier')}}">Hotels & Contracts</a></li>
                        <li><a class="category_menu"  data-single-click href="{{route('tulio-care')}}">Tulio Care</a></li>
                    </ul>
                </div>
                <div>
                    <!--<div class="title">-->
                    <!--    <h3>Journal</h3>-->
                    <!--    <div class="arrow-down image-container">-->
                    <!--        <img loading="lazy" src="{{asset('assets/footer-arrow.svg')}}" alt="" />-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<ul class="content">-->
                    <!--    <li><a data-single-click href="">Curtains Spaces +</a></li>-->
                    <!--    <li><a data-single-click href="">Blinds Spaces</a></li>-->
                    <!--    <li><a data-single-click href="">DIY</a></li>-->
                    <!--    <li><a data-single-click href="">Video Bytes</a></li>-->
                    <!--    <li><a data-single-click href="">Expert Speaks</a></li>-->
                    <!--</ul>-->
                    <!--<div class="title">-->
                    <!--    <h3>Drawing the curtains</h3>-->
                    <!--    <div class="arrow-down image-container">-->
                    <!--        <img loading="lazy" src="{{asset('assets/footer-arrow.svg')}}" alt="" />-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<ul class="content">-->
                    <!--    <li><a data-single-click href="">Design Library</a></li>-->
                    <!--    <li><a data-single-click href="">Style Stories</a></li>-->
                    <!--    <li><a data-single-click href="">Projects & Collaborations </a></li>-->
                    <!--    <li><a data-single-click href="">See All</a></li>-->
                    <!--</ul>-->
                    <br>
                    <div class="title">
                        <h3>RESOURCES</h3>
                        <div class="arrow-down image-container">
                            <img loading="lazy" src="{{asset('assets/footer-arrow.svg')}}" alt="" />
                        </div>
                    </div>
                    <ul class="content">
                        <li><a class="category_menu"  data-single-click href="{{route('contact')}}">Studio Locator</a></li>
                        <li><a class="category_menu"  data-single-click href="{{route('faq')}}">FAQs</a></li>
                        <li><a class="category_menu"  data-single-click href="{{route('terms-and-conditions')}}">Terms & Conditions</a></li>
                    </ul>
                </div>
            </div>
            @livewire('get-in-touch')
        </div>
        <div class="wrapper mob-mod ftr-bottom">
             <div class="location-inr">
                <span id="geo-config-text" style="cursor: pointer;color:#494949;font-size: 13px;" class="skiptranslate wt-display-inline-block wt-vertical-align-middle space" data-bs-toggle="modal" data-bs-target="#exampleModal">&nbsp;
                @if (isset($_COOKIE["Country"]) )
                {{$_COOKIE["Country"]}}
                @else India
                 @endif   &nbsp; | &nbsp;
            
                @if (isset($_COOKIE["googtrans"]) )
                @if($_COOKIE["googtrans"] == "/en/en") English (UK) @endif
                @if($_COOKIE["googtrans"] == "/en/hi") Hindi @endif
                @if($_COOKIE["googtrans"] == "/en/ar") Arabic @endif
                @if($_COOKIE["googtrans"] == "/en/bn") Bengali @endif
                @if($_COOKIE["googtrans"] == "/en/zh-CN") Chinese (Simplified) @endif
                @if($_COOKIE["googtrans"] == "/en/ja") Japanese @endif
                @if($_COOKIE["googtrans"] == "/en/pt") Portuguese @endif
                @if($_COOKIE["googtrans"] == "/en/ru") Russian @endif
                @if($_COOKIE["googtrans"] == "/en/ro") Romanian @endif
                @if($_COOKIE["googtrans"] == "/en/es") Spanish @endif
                @else English (UK)
                 @endif  

                 &nbsp; | &nbsp;
                @if (isset($_COOKIE["Currency"]) )
                {{$_COOKIE["Currency"]}}
                @else INR
                 @endif
                </span>
                
             </div>
             <div class="cprght-part">
                <span class="space"  style="font-size:12px;color:#494949;float: right;">&copy; <script type="text/javascript">document.write(new Date().getFullYear());</script> , Tulips Ambbience Furnishing LLC Developed &amp; Maintained by: <a style="color:#494949" href="https://lnsel.com/" target="_blank" >Lee & Nee Softwares (Exports) Ltd.</a></span>
                <span class="space"><a data-single-click href="{{route('privacy-policy')}}">Privacy Policy</a> | <a data-single-click href="{{route('terms-and-conditions')}}">Terms & Conditions</a></span>
             </div>
            
                
                
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
            width: 40px;
            height: 40px;
        }


    </style>
    </footer>
          {{-- modal --}}
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Update your settings</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p style="margin-bottom:10px;color:#333;font-size:14px;">Set where you live, what language you speak and the currency you use.</p>
                  <form id="region">
                    <div class="skiptranslate goog-te-gadget" dir="ltr" style="">
                        <div id=":0.targetLanguage">
                            <label for="">Region</label>
                  <select id="countries" name="countries" class="wt-select__element">
                    <option value="India" selected="selected">India</option>
                    <option value="United Arab Emirates">United Arab Emirates</option>
                    <option value="Malta" selected="selected">Malta</option>
                    <option value="Greece">Greece</option>
                    <option value="Australia">Australia</option>
                    <option value="Canada">Canada</option>
                    <option value="France">France</option>
                    <option value="Germany">Germany</option>
                    <option value="Ireland">Ireland</option>
                    <option value="Italy">Italy</option>
                    <option value="Japan">Japan</option>
                    <option value="New Zealand">New Zealand</option>
                    <option value="Poland">Poland</option>
                    <option value="Portugal">Portugal</option>
                    <option value="Spain">Spain</option>
                    <option value="The Netherlands">The Netherlands</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="United States">United States</option>
               
            </select>
        </div>
    </div>
        </form>

            <label style="padding-top: 8px" for="">Language</label>
            <form id="lang">
                <div class="skiptranslate goog-te-gadget" dir="ltr" style="">
                <div id=":0.targetLanguage">
            <select id="googtrans" name="googtrans" class="goog-te-combo" aria-label="Language Translate Widget">
                <option value="/en/ar">Arabic</option>
                <option value="/en/bn">Bengali</option>
                <option value="/en/zh-CN">Chinese (Simplified)</option>
                <option value="/en/en" selected="selected">English</option>
                <option value="/en/hi">Hindi</option>
                <option value="/en/ja">Japanese</option>
                <option value="/en/pt">Portuguese</option>
                <option value="/en/ro">Romanian</option>
                <option value="/en/ru">Russian</option>
                <option value="/en/es">Spanish</option>
      </select>
      {{-- <div id="google_translate_element"><span style="font-size:12px;">Translate this page to <span></div> --}}
    </div>
                </div>
            </form>
            <form id="currency">
                <div class="skiptranslate goog-te-gadget" dir="ltr" style="">
                    <div id=":0.targetLanguage">
      <label style="padding-top: 8px" for="">Currency</label>
      <select id="currencies" name="currencies" class="wt-select__element">
        <option value="INR">₹ Indian Rupee (INR)</option>
        <option value="AED">د.إ United Arab Emirates Dirham (AED)</option>
        <option value="USD"> $ United States Dollar (USD)</option>
        <option value="EUR"> € Euro (EUR)</option>
   
</select>
</div>
</div>
</form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button id="btnSave" type="button" onClick="window.location.reload();" class="btn btn-primary">Save</button>
                </div>
              </div>
            </div>
        </div>
        
     
    {{-- modal end --}}
     {{-- cookies for region start --}}
     <script type='text/javascript'>
        $(document).ready(function(e){
        var name = "Country=";
        var ca = document.cookie.split(';');
        for(var i=0; i<ca.length; i++)
          {
          var c = ca[i].trim();
          if (c.indexOf(name)==0) $('#countries').val(c.substring(name.length,c.length));
          }
        });
        $('#countries').change(function(e)
        {

        });
        $(function () {
                $("#btnSave").click(function () {

                   let country = document.forms["region"]["countries"].value ;

                   var cookieVal = "Country="+country+";expires=Fri, 31 Dec 9999 23:59:59 GMT;path=/";
        document.cookie = cookieVal ;
                });
            });
          </script>
          {{-- cookies for region end --}}

          {{-- cookies for language start --}}
          <script type='text/javascript'>
            $(document).ready(function(e){
            var name = "googtrans=";
            var ca = document.cookie.split(';');
            for(var i=0; i<ca.length; i++)
              {
              var c = ca[i].trim();
              if (c.indexOf(name)==0) $('#googtrans').val(c.substring(name.length,c.length));
              }
            });
            $('#googtrans').change(function(e)
            {
    
            });
            $(function () {
                    $("#btnSave").click(function () {
    
                       let language = document.forms["lang"]["googtrans"].value ;
    
                       var cookieVal = "googtrans="+language+";expires=Fri, 31 Dec 9999 23:59:59 GMT;";
                      
                        
            document.cookie = cookieVal ;
                    });
                });
              </script>
          {{-- cookies for language end --}}

           {{-- cookies for currencies start --}}
   

<script type='text/javascript'>
    $(document).ready(function(e){
    var name = "Currency=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++)
      {
      var c = ca[i].trim();
      if (c.indexOf(name)==0) $('#currencies').val(c.substring(name.length,c.length));
      }
    });
    $('#currencies').change(function(e)
    {

    });
    $(function () {
            $("#btnSave").click(function () {

               let curr = document.forms["currency"]["currencies"].value ;

                var cookieVal = "Currency="+curr+";expires=Fri, 31 Dec 9999 23:59:59 GMT;path=/";
    document.cookie = cookieVal ;
            });
        });
      </script>


    
        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script src="{{asset('scripts/lazyload.min.js')}}"></script>

    <script src="{{asset('scripts/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('scripts/main.js')}}"></script>
    {{-- <script src="{{asset('scripts/instafeed.min.js')}}"></script> --}}
    {{-- <script type="text/javascript">
        var userFeed = new Instafeed({
            get: 'user',
            target: "instafeed-container",
            resolution: 'low_resolution',
            accessToken: 'IGQVJYQk9nNnl1QXhOOHA0NmcyZA3JkcHFIdDdtc09ZAZA1FwaEtaYWpzNXRkOWNNc2dzMWt3aUNpNF9kajlKVUxvUjJEVXUzbmV6SjAzYnFQcmZA3WW8tQnpteDU4U0dNZAXpBYldRMU5pVUNsRV8tZAzhfbgZDZD'

        });
        userFeed.run();
    </script> --}}

    {{-- script to prevent multiple spam clicks on a button --}}
<script>
    let linkToBeOpened="";
    const buttons = document.querySelectorAll("[data-single-click]");
    for (var i = 0; i < buttons.length; i++) {

        buttons[i].addEventListener('click', function(event) {
            link = $(this).attr('href');
            if(!link){
                link = $(this).attr('onClick').slice(21);
            }
            
            if (linkToBeOpened == link){
                console.log("preventing:", link );
            event.preventDefault();
            return false; 
            }else{
                
                linkToBeOpened = link;
            }
        
    });
}
</script>

<script>
    function imgError(image) {
            image.onerror = "";
            image.src = "{{asset('assets/no-image.svg')}}";
            return true;
        }
</script>

<script>
 
        

        var numberValidate = function (instance) { 

            var input = document.querySelector("#phone"+instance),
        errorMsg = document.querySelector("#error-msg"+instance),
        validMsg = document.querySelector("#valid-msg"+instance);
            console.log("hii",validMsg);
    // here, the index maps to the error code returned from getValidationError - see readme
    var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];
 
    // initialise plugin
    var iti = window.intlTelInput(input, {
        // For Setting India as Default Option
        separateDialCode: false,
        //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        initialCountry: "in",
        geoIpLookup: function (callback) {
            $.get('https://ipinfo.io', function () { }, "jsonp").always(function (resp) {
                var countryCode = (resp && resp.country) ? resp.country : "gb";
                callback(countryCode);
            });
        },
        utilsScript: "../js/utils.js?1638200991544"
    });
 
    $(document).ready(function () {
        $('.iti__flag-container').ready(function () {
            var countryCode = $('.iti__selected-flag').attr('title');
            var countryCode = countryCode.replace(/[^0-9]/g, '')
            $('#phone'+instance).val("");
            $('#phone'+instance).val("+" + countryCode + " " + $('#phone'+instance).val());
        });
    });
 
    var reset = function () {
        input.classList.remove("error");
        errorMsg.innerHTML = "";
        errorMsg.classList.add("hide");
        validMsg.classList.add("hide");
    };
 
    // on blur: validate
    input.addEventListener('blur', function () {
        checkNumber();
 
    });
    // on keyup / change flag: reset
    input.addEventListener('change', reset);
    input.addEventListener('keyup', reset);
 
 
 
    function checkNumber() {            
            reset();
        if (input.value.trim()) {
            if (iti.isValidNumber()) {
                validMsg.classList.remove("hide");
                return true;
 
            } else {
                input.classList.add("error");
                var errorCode = iti.getValidationError();
                errorMsg.innerHTML = errorMap[errorCode];
                errorMsg.classList.remove("hide");
                errorMsg.innerHTML = errorMap[errorCode];
                event.preventDefault();
                // return false;
            }
        }
    }
 }
 if(document.getElementById("phone1")){
 numberValidate(1);
}

if(document.getElementById("phone2")){
 numberValidate(2);
}

if(document.getElementById("phone3")){
 numberValidate(3);
}

if(document.getElementById("phone4")){
 numberValidate(4);
}

 </script>

    @yield('script')
 
    <!--<script src="https://celebrity-production.solutionsfinder.co.uk/tulio/vendor/livewire/livewire.js?id=de3fca26689cb5a39af4" data-turbo-eval="false" data-turbolinks-eval="false"></script>-->
    @livewireScripts
    
</body>

</html>
