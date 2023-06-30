<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5CZ3J2C');
    </script>
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
    <meta name="facebook-domain-verification" content="y90yuxbctj8jej75r0h4sy0m8y2r8b" />
    <?php $randno = rand(10, 600); ?>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('scripts/jquery.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('.pluscontent').hide();

            $(document).on('click', '.submenu', function() {
                $(this).addClass("visible-submenu");
                $(this).next().show();
            });

            $(document).on('click', '.visible-submenu', function() {
                $(this).next().hide();
                $(this).removeClass("visible-submenu");
            });

            $(document).on('click', '.fa-plus', function() {
                $(this).removeClass("fa-plus");
                $(this).addClass("fa-minus");
                $(this).next().show();
            });

            $(document).on('click', '.fa-minus', function() {
                $(this).next().hide();
                $(this).removeClass("fa-minus");
                $(this).addClass("fa-plus");
            });


            if ($('section.banner').size() > 0) {
                $('header').addClass('hasBanner');
            } else {
                $('header').addClass('noBanner');
            }
            $(window).scroll(function() {
                var topScroll = $(window).scrollTop();
                if (topScroll > 0) {
                    $('header#mynav').addClass('fixed');
                } else {
                    $('header#mynav').removeClass('fixed');
                }
            })
        })
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="{{ asset('styles/vendors/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('styles/vendors/owl-carousel/owl.theme.default.min.css') }}" />
    <!-- Main CSS -->

    <link rel="stylesheet" href="{{ asset('styles/main.css?id='.$randno.'') }}" />
    <!--<link rel="stylesheet" href="https://celebrity-production.solutionsfinder.co.uk/tulio/styles/loggedin.css"/>-->
    <script src="{{ asset('js/intlTelInput.min.js?id='.$randno.'') }}"></script>

    <link rel="stylesheet" href="{{ asset('css/intlTelInput.css?id='.$randno.'') }}">
    <title>{{ $title ?? 'Project Management Tool for Architects & Interior Designers | Tulio' }}</title>
    <meta name="description" content="{{ $description ?? ' ' }}">
    <meta name="keywords" content="{{ $keywords ?? ' ' }}">

    <link rel="canonical" href="{{ url()->current() }}" />

    <style>
        /*    .theme-accordion .accordion-title {*/
        /*    color: #666666;*/
        /*    font-family: Montserrat, sans-serif;*/
        /*    font-size: 14px !important;*/
        /*    line-height: 26px;*/
        /*    text-transform: uppercase;*/
        /*    letter-spacing: 0;*/
        /*    font-weight: 500;*/
        /*    padding: 15px 0px;*/
        /*}*/

        /*.theme-accordion ul.accordion-list {*/
        /*    position: relative;*/
        /*    display: block;*/
        /*    width: 100%;*/
        /*    height: auto;*/
        /*    padding: 0px;*/
        /*    margin: 0;*/
        /*    list-style: none;*/
        /*}*/
        /*.theme-accordion ul.accordion-list li {*/
        /*    position: relative;*/
        /*    display: block;*/
        /*    width: 100%;*/
        /*    height: auto;*/
        /*    cursor: pointer;*/
        /*    border: none !important;*/
        /*    border-bottom: solid 1px #d3d3d3 !important;*/
        /*    border-radius: 0px;*/
        /*}*/

        /*.theme-accordion ul.accordion-list li h3 {*/
        /*    color: #666666;*/
        /*    font-family: Montserrat, sans-serif;*/
        /*    font-size: 14px !important;*/
        /*    line-height: 26px !important;*/
        /*    outline: none !important;*/
        /*    box-shadow: none;*/
        /*    text-transform: uppercase;*/
        /*    letter-spacing: 0;*/
        /*    font-weight: 500;*/
        /*    padding: 12px 0px;*/
        /*    margin: 0;*/
        /*}*/
        /*.theme-accordion ul.accordion-list li h3:after {*/
        /*  content: "";*/
        /*    position: absolute;*/
        /*    right: 20px;*/
        /*    top: 15px;*/
        /*    width: 5px;*/
        /*    height: 5px;*/
        /*    border: solid #666666;*/
        /*    border-width: 0 2px 2px 0;*/
        /*    display: inline-block;*/
        /*    padding: 1px;*/
        /*    transform: rotate(45deg);*/
        /*    -webkit-transform: rotate(45deg);*/
        /*    transition: 0.5s;*/
        /*}*/
        /*.theme-accordion ul.accordion-list li.active h3:after {*/
        /*      transform: rotate(225deg);*/
        /*    -webkit-transform: rotate(225deg);*/
        /*    transition: 0.5s;*/
        /*}*/
        /*.theme-accordion ul.accordion-list li div.answer {*/
        /*  position: relative;*/
        /*  display: block;*/
        /*  width: 100%;*/
        /*  height: auto;*/
        /*  margin: 0; */
        /*  cursor: pointer;*/
        /*}*/
        /*.theme-accordion ul.accordion-list li div.answer p {*/
        /*  font-family: Montserrat, serif;*/
        /*    font-size: 14px;*/
        /*    color: #666666;*/
        /*    line-height: 24px;*/
        /*    margin-bottom: 10px;*/
        /*    font-weight: 500;*/
        /*}*/
        .footer-links h3 {
            font-family: EB Garamond, serif;
            color: #333333;
            font-size: 24px;
            padding-bottom: 19px;
            line-height: 1.51;
        }

        .iti--allow-dropdown {
            width: 100%;
        }

        #error-msg3 {
            color: red !important;
            margin-bottom: 12px;
            margin-top: -12px;
            font-size: 14px
        }

        #valid-msg3 {
            color: green !important;
            margin-bottom: 12px;
            margin-top: -12px;
            font-size: 14px
        }

        #error-msg5 {
            color: red !important;
            margin-bottom: 12px;
            margin-top: -12px;
            font-size: 14px
        }

        #valid-msg5 {
            color: green !important;
            margin-bottom: 12px;
            margin-top: -12px;
            font-size: 14px
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
            transition: transform .3s ease-out, -webkit-transform .3s ease-out;
            -webkit-transform: translate(0, -50px);
            transform: translate(0, -50px)
        }

        .modal-content {
            border-radius: 24px !important;
            padding: 10px
        }

        .modal-body select,
        .modal-body input {
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

        .modal-body input {
            cursor: auto !important;
        }

        .modal-body label {
            font-weight: 200;
            font-size: 18px;
            line-height: 40px;
            color: #333;
            font-family: 'EB Garamond, serif';
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

        .modal-dialog-scrollable .modal-footer,
        .modal-dialog-scrollable .modal-header {
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
            border: 1px solid rgba(0, 0, 0, .2);
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
            line-height: 1.5;
            color: #333;
            font-size: 16px;
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
                max-width: 500px;
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

            .modal-lg,
            .modal-xl {
                max-width: 800px
            }
        }

        @media (min-width: 1200px) {
            .modal-xl {
                max-width: 1140px
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
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
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

        .banner-img-1 {
            height: 100vh !important;
        }

        .popup-label {
            font-weight: 200;
            font-size: 18px;
            line-height: 40px;
            color: #333;
            font-family: 'EB Garamond, serif';
        }


        /* start home banner products link */
        @media only screen and (max-width: 1023px) and (min-width: 0px) {


            header.hasBanner select {
                color: #000 !important;
            }


        }


        @media only screen and (max-width: 1150px) and (min-width: 0px) {
            .mob-mod {
                padding-top: 0;
                display: flex !important;
                align-items: center !important;
                justify-items: center !important;
                flex-direction: column !important;
            }

            .space {
                margin-bottom: 12px;
            }

            .bx {
                font-size: 20px;
            }
        }

        @media only screen and (min-width: 0px) {
            .room-details-item {
                position: relative;
                margin-bottom: 30px;
            }

            .bx {
                font-family: boxicons !important;
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

            .room-details-item .room-item i {
                font-size: 16px;
                width: 20px;
                height: 20px;
                line-height: 20px;
                background-color: #fff;
                border-radius: 50px;
                color: #6b6b6b;
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
                position: absolute;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                border-radius: 50%;
                border: 1px solid #fff;
                -webkit-animation: ripple 1s linear 2s infinite;
                animation: ripple 1s linear 2s infinite;
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
                top: -55px;
                left: -17px;
                -webkit-transition: .7s;
                transition: .7s;
                opacity: 0;
            }

            .room-details-item .room-item .room-item-content h3 {
                font-size: 14px;
                font-weight: 500;
                color: #3e181d;
                margin-bottom: 0;
                white-space: nowrap;
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

            .tulio-portal-desc .wrapper ul li .content {
                margin-left: 20px;
            }
        }

        /* end home banner products link */
        /* g-translate css */
        body {
            top: 0 !important
        }

        .goog-logo-link {
            display: none !important;
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

        select:focus-visible {
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

        .desktop-image .image-container {
            cursor: pointer;
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

        header hr {
            display: block;
            clear: both;
        }

        header .wrapper nav ul a {
            font-size: 12px;
        }

        ul.menu-home-desktop {
            float: right;
        }

        header.hasBanner:hover .wrapper a,
        header.hasBanner .wrapper a {
            color: #fff;
        }

        header.noBanner:hover .wrapper a,
        header.noBanner .wrapper a {
            color: #000;
        }

        header.noBanner {
            position: relative
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

        .header-search .category,
        .header-search .product {
            width: 100%;
        }

        .header-search a {
            color: #000 !important;
        }

        .shadow-img {
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
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5CZ3J2C" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Main JS -->
    <!-- Header -->
    <header id="mynav" class="navbar-fixed-top">
        <x-navbar />
    </header>
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
                            <img loading="lazy" src="{{ asset('assets/footer-arrow.svg') }}" alt="" />
                        </div>
                    </div>
                    <span class="space social-part" style="cursor: pointer;"><a style="color: #888" target="_blank"
                            href="https://in.linkedin.com/company/tulio-pvt-ltd"><i
                                class='bx bxl-linkedin'></i></a>&nbsp;<a target="_blank" style="color: #888"
                            href="https://www.facebook.com/profile.php?id=100064118888869"><i
                                class='bx bxl-facebook'></i></a>&nbsp;<a target="_blank" style="color: #888"
                            href="https://www.instagram.com/officialtuliodesign/"><i
                                class='bx bxl-instagram'></i></a>&nbsp;<a target="_blank" style="color: #888"
                            href="https://in.pinterest.com/officialtuliodesign/"><i
                                class='bx bxl-pinterest-alt'></i></a></span>
                </div>
                <div>
                    <div class="title">
                        <h3>ABOUT US</h3>
                        <div class="arrow-down image-container">
                            <img loading="lazy" src="{{ asset('assets/footer-arrow.svg') }}" alt="" />
                        </div>
                    </div>
                    <ul class="content">
                        <li><a class="category_menu" data-single-click href="{{ route('process') }}">Our Process</a>
                        </li>
                        <li><a class="category_menu" data-single-click href="">Behind the Curtain</a></li>
                    </ul>
                </div>

                <div>
                    <div class="title">
                        <h3>PRODUCTS</h3>
                        <div class="arrow-down image-container">
                            <img loading="lazy" src="{{ asset('assets/footer-arrow.svg') }}" alt="" />
                        </div>
                    </div>
                    <ul class="content">
                        @php
                            $categories = App\Models\Category::findMany([1, 10, 17]);
                        @endphp
                        @foreach ($categories as $category)
                            <li>
                                <!--<a class="category_menu" data-single-click href="{{ route('product.type', ['category' => $category]) }}">{{ $category->cat_nm }} </a><i class="fa fa-plus" style="font-size:12px;"></i>-->
                                <a class="category_menu submenu"
                                    @if ($category->cat_nm === 'Rugs') data-single-click href="{{ route('category', $category) }}" @endif>{{ $category->cat_nm === 'Blinds' ? 'Roman Blinds' : $category->cat_nm }}
                                </a>

                                @if ($category->cat_nm != 'Rugs')
                                    @if ($category->children->count())
                                        <ul class="pluscontent">
                                            @foreach ($category->children->take(2) as $child)
                                                <li><a data-single-click
                                                        href="{{ route('product.category', ['category' => $category, 'subcategory' => $child->slug]) }}">{{ $child->cat_nm }}</a>
                                                </li>
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
                            <img loading="lazy" src="{{ asset('assets/footer-arrow.svg') }}" alt="" />
                        </div>
                    </div>
                    <ul class="content">
                        <li><a class="category_menu" data-single-click href="{{ route('designer') }}">A+ID Portal</a>
                        </li>
                        <li><a class="category_menu" data-single-click href="{{ route('hotelier') }}">Hotels &
                                Contracts</a></li>
                        <li><a class="category_menu" data-single-click href="{{ route('tulio-care') }}">Tulio
                                Care</a></li>
                    </ul>
                </div>
                <div>
                    <!--<div class="title">-->
                    <!--    <h3>Journal</h3>-->
                    <!--    <div class="arrow-down image-container">-->
                    <!--        <img loading="lazy" src="{{ asset('assets/footer-arrow.svg') }}" alt="" />-->
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
                    <!--        <img loading="lazy" src="{{ asset('assets/footer-arrow.svg') }}" alt="" />-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<ul class="content">-->
                    <!--    <li><a data-single-click href="">Design Library</a></li>-->
                    <!--    <li><a data-single-click href="">Style Stories</a></li>-->
                    <!--    <li><a data-single-click href="">Projects & Collaborations </a></li>-->
                    <!--    <li><a data-single-click href="">See All</a></li>-->
                    <!--</ul>-->
                    <!-- <br> -->
                    <div class="title">
                        <h3>RESOURCES</h3>
                        <div class="arrow-down image-container">
                            <img loading="lazy" src="{{ asset('assets/footer-arrow.svg') }}" alt="" />
                        </div>
                    </div>
                    <ul class="content">
                        <li><a class="category_menu" data-single-click href="{{ route('contact') }}">Studio
                                Locator</a></li>
                        <li><a class="category_menu" data-single-click href="{{ route('faq') }}">FAQs</a></li>
                        <li><a class="category_menu" data-single-click
                                href="{{ route('terms-and-conditions') }}">Terms & Conditions</a></li>
                    </ul>
                </div>


                <!--<div>-->
                <!--    <div class="title">-->
                <!--        <h3>About Us</h3>-->
                <!--        <div class="arrow-down image-container">-->
                <!--            <img loading="lazy" src="{{ asset('assets/footer-arrow.svg') }}" alt="" />-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <ul class="content">-->
                <!--        <li><a data-single-click href="{{ route('contact') }}">Contact</a></li>-->
                <!--        <li><a data-single-click href="">Career</a></li>-->
                <!--    </ul>-->
                <!--</div>-->
            </div>
            @livewire('get-in-touch')
        </div>
        <div class="wrapper mob-mod ftr-bottom">
            <div class="location-inr">
                <span style="cursor: pointer;color:#494949;font-size: 13px;" id="geo-config-text"
                    class="skiptranslate wt-display-inline-block wt-vertical-align-middle space"
                    data-bs-toggle="modal" data-bs-target="#exampleModal">&nbsp;
                    @if (isset($_COOKIE['Country']))
                        {{ $_COOKIE['Country'] }}
                    @else
                        India
                    @endif &nbsp; | &nbsp;

                    @if (isset($_COOKIE['googtrans']))
                        @if ($_COOKIE['googtrans'] == '/en/en')
                            English (UK)
                        @endif
                        @if ($_COOKIE['googtrans'] == '/en/hi')
                            Hindi
                        @endif
                        @if ($_COOKIE['googtrans'] == '/en/ar')
                            Arabic
                        @endif
                        @if ($_COOKIE['googtrans'] == '/en/bn')
                            Bengali
                        @endif
                        @if ($_COOKIE['googtrans'] == '/en/zh-CN')
                            Chinese (Simplified)
                        @endif
                        @if ($_COOKIE['googtrans'] == '/en/ja')
                            Japanese
                        @endif
                        @if ($_COOKIE['googtrans'] == '/en/pt')
                            Portuguese
                        @endif
                        @if ($_COOKIE['googtrans'] == '/en/ru')
                            Russian
                        @endif
                        @if ($_COOKIE['googtrans'] == '/en/ro')
                            Romanian
                        @endif
                        @if ($_COOKIE['googtrans'] == '/en/es')
                            Spanish
                        @endif
                    @else
                        English (UK)
                    @endif
                    &nbsp; | &nbsp;

                    @if (isset($_COOKIE['Currency']))
                        {{ $_COOKIE['Currency'] }}
                    @else
                        INR
                    @endif
                </span>


                <script>
                    window.onload = function getIPDetails() {
                        var ipAddress = document.getElementById("txtIP").value;
                        let cookies = getCookies();

                        //check if dosent cookies exist
                        if (!cookies["Currency"] || !cookies["Country"]) {
                            console.log("running prediction");

                            var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    let result = JSON.parse(xhttp.responseText);
                                    console.log("result", result);
                                    // set predicted cookies
                                    document.cookie = "Currency=" + result["currency"].substring(0, 3).substring(0, 3) +
                                        ";expires=Fri, 31 Dec 9999 23:59:59 GMT;path=/";
                                    document.cookie = "Country=" + result["country_name"] +
                                        ";expires=Fri, 31 Dec 9999 23:59:59 GMT;path=/";

                                    document.getElementById("geo-config-text").innerHTML = result["country_name"] +
                                        " | English (UK) | " + result["currency"].substring(0, 3).substring(0, 3);

                                    if (window.location.pathname != '/') {
                                        window.location.reload();
                                    }

                                }
                            };
                            xhttp.open("GET", "https://ip-api.io/json/" + ipAddress, true);
                            xhttp.send();
                        }

                    }

                    function getCookies() {

                        let cookie = {};

                        document.cookie.split(';').forEach(function(oneCookie) {
                            let [cookieName, cookieValue] = oneCookie.split('=');
                            cookie[cookieName.trim()] = cookieValue;
                        });
                        return cookie;
                    }
                </script>

                <input style="display: none" type="text" id="txtIP" placeholder="Enter the ip address" />
                <button style="display: none" onclick="getIPDetails()">Get IP Details</button>

            </div>
            <div class="cprght-part">
                <span class="space" style="font-size:12px;color:#494949;float: right;">&copy;
                    <script type="text/javascript">
                        document.write(new Date().getFullYear());
                    </script> , Tulips Ambbience Furnishing LLC Developed &amp; Maintained by: <a
                        style="color:#494949" href="https://lnsel.com/" target="_blank">Lee & Nee Softwares (Exports)
                        Ltd.</a>
                </span>

                <span class="space"><a data-single-click href="{{ route('privacy-policy') }}">Privacy Policy</a> |
                    <a data-single-click href="{{ route('terms-and-conditions') }}">Terms & Conditions</a></span>
            </div>

        </div>
        <div id="whatsappIcon"><a
                href="https://api.whatsapp.com/send?phone=+919225555559&amp;text=Hi%20Support%20Team" target="_blank"
                aria-describedby="a11y-new-window-external-message" rel="null noopener">
                <svg viewBox="2619 506 120 120" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <style>
                            .cls-1 {
                                fill: #27d045;
                            }

                            .cls-2,
                            .cls-5 {
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
                        </style>
                    </defs>
                    <g data-name="Group 36" id="Group_36" transform="translate(2300 73)">
                        <circle class="cls-1" cx="60" cy="60" data-name="Ellipse 18" id="Ellipse_18"
                            r="60" transform="translate(319 433)"></circle>
                        <g data-name="Group 35" id="Group_35" transform="translate(254 386)">
                            <g data-name="Group 34" id="Group_34">
                                <g class="cls-2" data-name="Ellipse 19" id="Ellipse_19"
                                    transform="translate(94 75)">
                                    <circle class="cls-4" cx="31.5" cy="31.5" r="31.5"></circle>
                                    <circle class="cls-5" cx="31.5" cy="31.5" r="29"></circle>
                                </g>
                                <path class="cls-3" d="M1424,191l-4.6,16.3,16.9-4.7.9-5.2-11,3.5,2.9-10.5Z"
                                    data-name="Path 126" id="Path_126" transform="translate(-1325 -68)"></path>
                                <path class="cls-1" d="M1266,90c0-.1,3.5-11.7,3.5-11.7l8.4,7.9Z"
                                    data-name="Path 127" id="Path_127" transform="translate(-1165 43)"></path>
                            </g>
                            <path class="cls-3"
                                d="M1439.3,160.6a9.4,9.4,0,0,0-3.9,6.1c-.5,3.9,1.9,7.9,1.9,7.9a50.876,50.876,0,0,0,8.6,9.8,30.181,30.181,0,0,0,9.6,5.1,11.378,11.378,0,0,0,6.4.6,9.167,9.167,0,0,0,4.8-3.2,9.851,9.851,0,0,0,.6-2.2,5.868,5.868,0,0,0,0-2c-.1-.7-7.3-4-8-3.8s-1.3,1.5-2.1,2.6-1.1,1.6-1.9,1.6-4.3-1.4-7.6-4.4a15.875,15.875,0,0,1-4.3-6s.6-.7,1.4-1.8a5.664,5.664,0,0,0,1.3-2.4c0-.5-2.8-7.6-3.5-7.9A11.852,11.852,0,0,0,1439.3,160.6Z"
                                data-name="Path 128" id="Path_128" transform="translate(-1326.332 -68.467)"></path>
                        </g>
                    </g>
                </svg></a></div>



        <style>
            #whatsappIcon {
                position: fixed;
                bottom: 30px;
                right: 30px;
                width: 50px;
                height: 50px;
                z-index: 9999;
            }

            #whatsappIcon a,
            #whatsappIcon svg {
                display: block;
                width: 40px;
                height: 40px;
            }
        </style>
        {{-- modal --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update your settings</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p style="margin-bottom:10px;color:#333;font-size:14px;">Set where you live, what language you
                            speak and the currency you use.</p>
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

                        <form id="lang">
                            <div class="skiptranslate goog-te-gadget" dir="ltr" style="">
                                <div id=":0.targetLanguage">
                                    <label style="padding-top: 8px" for="">Language</label>
                                    <select id="googtrans" name="googtrans" class="goog-te-combo"
                                        aria-label="Language Translate Widget">
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
                        <button id="btnSave" type="button" onClick="window.location.reload();"
                            class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>


        {{-- modal end --}}




        {{-- Promote A+id register --}}

        {{-- modal --}}
        <div class="modal fade" id="promoteModal" tabindex="-1" aria-labelledby="promoteModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="promoteModalLabel">Browse an exclusive collection of 500+ designs
                            by signing-up / signing-in for access </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">


                        <p id="popup-body-text"style="padding: 20px 0px; color: #333; font-size:14px;">To Continue
                            Please Select below User option</p>
                        <select id="popup-select">
                            <option value="homeowner">Homeowner</option>
                            <option value="hotelier">Hotelier</option>
                            <option value="a+id">Architect & Interior Designer</option>
                        </select>

                        <div id="popup-contact-fields">
                            <form id="popup-contact-form">
                                <h5 class="popup-label">Name</h5>
                                <input name="popup-name" type="text" required placeholder="Name">
                                <h5 class="popup-label">Email</h5>
                                <input name="popup-email" type="email" required placeholder="Email id">
                                <h5 class="popup-label">Mobile</h5>
                                <input type="tel" name="popup-number" placeholder="Mobile"
                                    title="Please Enter 10 Digit Number" id="phone3" required>
                                <span id="valid-msg3" class="hide">✓ Valid</span>
                                <span id="error-msg3" class="hide"></span>
                                <input type="hidden" name="iti__selected-dial-code">

                                <input id="popup-form-token" name="_token" type="hidden"
                                    value="{{ csrf_token() }}">

                            </form>
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button id="btncontinue" type="button"
                            onClick="popupContinue()"class="btn btn-primary">Continue</button>
                    </div>
                </div>
            </div>
        </div>


        {{-- modal end --}}


    </footer>


    <script type='text/javascript'>
        var fields = document.getElementById("popup-contact-fields");
        var select = document.getElementById("popup-select");
        var continueBtn = document.getElementById("btncontinue");
        var thankText = document.getElementById("popup-body-text");


        var selection = "homeowner";

        select.onchange = changeListener;

        function changeListener() {
            var value = this.value;

            if (value == "homeowner") {
                fields.style.display = 'block';
                selection = "homeowner";
            } else if (value == "hotelier") {
                fields.style.display = 'block';
                selection = "hotelier";
            } else if (value == "a+id") {
                fields.style.display = 'none';
                selection = "a+id";
            }
        }

        function popupContinue() {
            if (selection == "a+id") {
                window.location.href = '{{ route('login') }}';
            } else {
                //validate and send email
                var form = document.forms['popup-contact-form'];


                if (form.reportValidity()) {

                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            thankText.innerHTML = 'Someone will be with you shortly';
                            continueBtn.style.display = 'none';
                            fields.style.display = 'none';
                            document.getElementById("popup-select").style.display = 'none';
                        }
                    }

                    xhttp.open("POST", "/contact-mail", true);
                    const formData = new FormData(form)
                    xhttp.send(formData);
                    continueBtn.innerHTML = "Loading";
                    continueBtn.disabled = true;
                } else {
                    console.log("not sending");

                }
            }

        }
    </script>

    {{-- cookies for region start --}}
    <script type='text/javascript'>
        $(document).ready(function(e) {
            var name = "Country=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i].trim();
                if (c.indexOf(name) == 0) $('#countries').val(c.substring(name.length, c.length));
            }
        });
        $('#countries').change(function(e) {

        });
        $(function() {
            $("#btnSave").click(function() {

                let country = document.forms["region"]["countries"].value;

                var cookieVal = "Country=" + country + ";expires=Fri, 31 Dec 9999 23:59:59 GMT;path=/";
                document.cookie = cookieVal;
            });
        });
    </script>
    {{-- cookies for region end --}}

    {{-- cookies for language start --}}
    <script type='text/javascript'>
        $(document).ready(function(e) {
            var name = "googtrans=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i].trim();
                if (c.indexOf(name) == 0) $('#googtrans').val(c.substring(name.length, c.length));
            }
        });
        $('#googtrans').change(function(e) {

        });
        $(function() {
            //get old language
            let oldLanguage = document.forms["lang"]["googtrans"].value

            $("#btnSave").click(function() {

                var ckDomain;
                for (var ckDomain = window.location.hostname.split("."); 2 < ckDomain.length;) {
                    ckDomain.shift();
                }
                ckDomain = ";domain=" + ckDomain.join(".");




                //get new language from form
                let language = document.forms["lang"]["googtrans"].value;

                oldCookie1 = "googtrans=" + oldLanguage +
                    ";expires=Fri, 31 Dec 1999 23:59:59 GMT;path='/';Domain=" + ckDomain;
                oldCookie2 = "googtrans=" + oldLanguage +
                ";expires=Fri, 31 Dec 1999 23:59:59 GMT;path='/';";


                //remove any old cookies if exist
                document.cookie = oldCookie1;
                document.cookie = oldCookie2;

                // add new cookie
                document.cookie = "googtrans=" + language +
                    ";expires=Fri, 31 Dec 2999 23:59:59 GMT;path='/';";
                document.cookie = "googtrans=" + language +
                    ";expires=Fri, 31 Dec 2999 23:59:59 GMT;path='/';Domain=" + ckDomain;


            });
        });
    </script>
    {{-- cookies for language end --}}

    {{-- cookies for currencies start --}}


    <script type='text/javascript'>
        $(document).ready(function(e) {
            var name = "Currency=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i].trim();
                if (c.indexOf(name) == 0) $('#currencies').val(c.substring(name.length, c.length));
            }
        });
        $('#currencies').change(function(e) {

        });
        $(function() {
            $("#btnSave").click(function() {

                let curr = document.forms["currency"]["currencies"].value;

                var cookieVal = "Currency=" + curr + ";expires=Fri, 31 Dec 9999 23:59:59 GMT;path=/";

                document.cookie = cookieVal;
            });
        });
    </script>



    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>
    <script src="{{ asset('scripts/lazyload.min.js') }}" defer></script>

    <script src="{{ asset('scripts/vendors/owl-carousel/owl.carousel.min.js') }}" defer></script>
    <script defer>
        $(document).ready(function() {


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
                    "<img class='carousel-control-left carousel-control'  style='height:40px;margin-top:-70px' src='./assets/a2.png' alt=''>",
                    "<img class='carousel-control-right carousel-control'  style='height:40px;margin-top:-70px' src='./assets/a1.png' alt=''>",
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

                items: 1,
                merge: true,
                loop: true,
                margin: 10,
                video: true,
                videoWidth: false, // Default false; Type: Boolean/Number
                videoHeight: false,
                nav: true,
                navText: [
                    "<img class='carousel-control-left carousel-control' style='height:40px;margin-top:-330px' src='./assets/a2.png' alt=''>",
                    "<img class='carousel-control-right carousel-control' style='height:40px;margin-top:-330px' src='./assets/a1.png' alt=''>",
                ],
                lazyLoad: true,
                center: true,
                responsive: {
                    480: {
                        items: 1,
                    },
                    600: {
                        items: 1,
                    },
                    1000: {
                        items: 1,
                    },
                }
            });
            $('.owl-home').owlCarousel({

                items: 1,
                merge: true,
                loop: true,
                margin: 10,
                slideTransition: 'linear',
                smartSpeed: 1000,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplayHoverPause: true,
                nav: true,
                dots: false,
                navText: [
                    "<img class='carousel-control-left carousel-control' style='height:40px;margin-top:-330px' src='./assets/a2.png' alt=''>",
                    "<img class='carousel-control-right carousel-control' style='height:40px;margin-top:-330px' src='./assets/a1.png' alt=''>",
                ],
                lazyLoad: true,
                center: true,
                responsive: {
                    480: {
                        items: 1,
                    },
                    600: {
                        items: 1,
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
                    "<img class='carousel-control-left carousel-control'  style='height:40px;margin-top:70px' src='./assets/a2.png' alt=''>",
                    "<img class='carousel-control-right carousel-control'  style='height:40px;margin-top:70px' src='./assets/a1.png' alt=''>",
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
        let linkToBeOpened = "";
        const buttons = document.querySelectorAll("[data-single-click]");
        for (var i = 0; i < buttons.length; i++) {
            buttons[i].addEventListener('click', function(event) {
                link = $(this).attr('href'),
                    console.log("clicked:", linkToBeOpened);
                if (linkToBeOpened == link) {
                    event.preventDefault();
                } else {
                    linkToBeOpened = link;
                }

            });
        }
    </script>

    <script src="{{ asset('scripts/main.js') }}" defer></script>

    <script defer>
        function imgError(image) {
            image.onerror = "";
            image.src = "{{ asset('assets/no-image.svg') }}";
            return true;
        }
    </script>

    <script>
        // var input = document.querySelector("#phone"),
        //     errorMsg = document.querySelector("#error-msg"),
        //     validMsg = document.querySelector("#valid-msg");



        var numberValidate = function(instance) {

            var input = document.querySelector("#phone" + instance),
                errorMsg = document.querySelector("#error-msg" + instance),
                validMsg = document.querySelector("#valid-msg" + instance);
            console.log("hii", validMsg);
            // here, the index maps to the error code returned from getValidationError - see readme
            var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

            // initialise plugin
            var iti = window.intlTelInput(input, {
                // For Setting India as Default Option
                separateDialCode: false,
                //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
                initialCountry: "in",
                geoIpLookup: function(callback) {
                    $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                        var countryCode = (resp && resp.country) ? resp.country : "gb";
                        callback(countryCode);
                    });
                },
                utilsScript: "../js/utils.js?1638200991544"
            });

            $(document).ready(function() {
                $('.iti__flag-container').ready(function() {
                    var countryCode = $('.iti__selected-flag').attr('title');
                    var countryCode = countryCode.replace(/[^0-9]/g, '')
                    $('#phone' + instance).val("");
                    $('#phone' + instance).val("+" + countryCode + " " + $('#phone' + instance).val());
                });
            });

            var reset = function() {
                input.classList.remove("error");
                errorMsg.innerHTML = "";
                errorMsg.classList.add("hide");
                validMsg.classList.add("hide");
            };

            // on blur: validate
            input.addEventListener('blur', function() {
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
        if (document.getElementById("phone1")) {
            numberValidate(1);
        }

        if (document.getElementById("phone2")) {
            numberValidate(2);
        }

        if (document.getElementById("phone3")) {
            numberValidate(3);
        }
        if (document.getElementById("phone5")) {
            numberValidate(5);
        }
    </script>


    @yield('script')
</body>

</html>
