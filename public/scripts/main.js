document.addEventListener("DOMContentLoaded", function(event) {
    var body = document.querySelector("body");
    //JS for a specific page

    try {
        //Lazy Loading Images
        var lazyLoadInstance = new LazyLoad({
            // Your custom settings go here
        });
    } catch (error) {
        console.error(error);
    }

    //Wait
    var wait = function(timeInterval) {
        return new Promise(function(resolve, reject) {
            setTimeout(function() {
                resolve();
            }, timeInterval);
        });
    };

    //Change banner image
    
    var changeBannerImage = function(targetElemet, imageArray) {
        try {
            var image = document.querySelector(targetElemet);
            var imageContainer = document.querySelector(".banner-image-container");
            var count = 1;
            var timeInverval = 4000;

            setInterval(async function() {
                console.log(imageArray[count % imageArray.length]);
                // imageContainer.classList.add("animation-fade-out-in");
                imageContainer.style.opacity = 0;
                await wait(600);
                image.src = imageArray[count % imageArray.length];
                await wait(600);
                imageContainer.style.opacity = 1;
                count += 1;
            }, timeInverval);
        } catch (error) {
            console.error(error);
        }
    };

    //Change Banner Image

    function ImageSliderContructor() {
        this.current = 1;
        this.imageSlider = function(targetElement, operation) {
            try {
                var images = document.querySelectorAll(targetElement);
                if (images.length <= 1) {
                    return 0;
                } else {
                    if (operation === "right") {
                        if (this.current == images.length) {
                            this.current = 0;
                            removeActive();
                            images[this.current].classList.add("active");
                            images[0].style.marginLeft = `-${this.current}00%`;
                            this.current += 1;
                        } else {
                            removeActive();
                            images[this.current].classList.add("active");
                            images[0].style.marginLeft = `-${this.current}00%`;
                            this.current += 1;

                        }
                    }
                    if (operation === "left") {
                        if (this.current == -1) {
                            this.current = images.length - 1;
                            removeActive();
                            images[this.current].classList.add("active");
                            images[0].style.marginLeft = `-${this.current}00%`;

                        } else {
                            removeActive();
                            images[this.current].classList.add("active");
                            images[0].style.marginLeft = `-${this.current}00%`;
                            this.current -= 1;

                        }
                    }

                    function removeActive() {
                        for (var i = 0; i < images.length; i++) {
                            images[i].classList.remove("active");
                        }
                    }
                }
            } catch (error) {
                console.error(error);
            }
        };
    }
    $.urlParam = function(name) {
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
        if (results != null) tmp = results[1];
        else tmp = 0;
        return tmp;
    }

    var pagesWithBannerImageSwitching = ["product-page", "index"];

    if (pagesWithBannerImageSwitching.indexOf(body.dataset.title) > -1) {
        // var imagesProductPage = [
        //   "./assets/product-oliver-bannerbg.svg",
        //   "./assets/process-page-bannerbg.svg",
        // ];
        // changeBannerImage(".banner-image", imagesProductPage);

        var timeInterval = 6000;
        var iSDesktop = new ImageSliderContructor();
        var iSMobile = new ImageSliderContructor();
        setInterval(function() {
            iSDesktop.imageSlider(".banner-image", "right");
            iSMobile.imageSlider(".banner-image-mobile", "right");
            if (($.urlParam('p') == "process") || ($.urlParam('p') == "hotelier") || ($.urlParam('p') == "designers")) {

            } else {
                if ($("#bannerheading").html() == "Tales Of The Nobel") {
                    $("#bannerheading").html("Biophilia Dreams");
                    $("#bannertext").html("Hand-sketched by our artists in-house, Biophilia Dreams is our attempt to<br/>increase interaction between humans and nature for its psychological benefits.");
                } else {
                    $("#bannerheading").html("Tales Of The Nobel");
                    $("#bannertext").html("Inspired by Pietra Dura, an Italian traditional craft of carving stone used<br/>in Mughal Architecture, this sheer textiles collection has a timeless appeal.");
                }
            }
        }, timeInterval);
    }


    $(document).ready(function() {
        //displaymotorizedoptions();
        $(window).scroll(function() {

            if (($(document).scrollTop() > 88)) {
                // $("header").css("background-color", "#ffffff");



            }
            /*if (($(document).scrollTop() <= 88)) {

              $("header").css("background-color", "transparent");

            }*/

        });
    });
    /*
        $(".navbar-fixed-top").hover(function() {

            $(".navbar-fixed-top").css("background-color", "#ffffff");

        });
    */
    /*$(".navbar-fixed-top").mouseout(function () {

      if (($(document).scrollTop() <= 88)) {
        $(".navbar-fixed-top").css("background-color", "transparent");

      }
    });

    $("header").mouseout(function () {
      if (($(document).scrollTop() <= 88)) {

        $(".navbar-fixed-top").css("background-color", "transparent");

      }
    });*/


    /*
        $(".navbar-fixed-top nav").hover(function() {

            $(".navbar-fixed-top").css("background-color", "#ffffff");

        });


        $(".navbar-fixed-top nav a").hover(function() {

            $(".navbar-fixed-top").css("background-color", "#ffffff");

        });

    */


    // Mobile Nav
    document
        .querySelector(".hamburger-menu")
        .addEventListener("click", function() {
            console.log("Clicked");
            document.querySelector(".mobile-nav-overlay").style.display = "block";
            document.querySelector(".mobile-nav").style.left = "0";
            $("body").css("overflow", "hidden");
        });

    document
        .querySelector(".cancel-nav")
        .addEventListener("click", function() {
            document.querySelector(".mobile-nav-overlay").style.display = "none";
            document.querySelector(".mobile-nav").style.left = "-100%";
            $("body").css("overflow", "auto");
        });

    document
        .querySelector(".mobile-nav-overlay")
        .addEventListener("click", function() {
            document.querySelector(".mobile-nav-overlay").style.display = "none";
            document.querySelector(".mobile-nav").style.left = "-100%";
            $("body").css("overflow", "auto");
        });
    // Search Function
    document.addEventListener('DOMContentLoaded', function () {
    document.querySelector("#searchicon").addEventListener("click", function(e) {
        e.preventDefault();
        console.log("Clicked");
        document.querySelector(".search-box").classList.add("show");
        $("body").css("overflow", "hidden");

        document.querySelector(".overlay").addEventListener("click", function() {
            document.querySelector(".search-box").classList.remove("show");
            $("body").css("overflow", "auto");
        });

        var cancelIcon = document.querySelector(".search-bar input");
        document
            .querySelector(".cancel-icon")
            .addEventListener("click", function() {
                document.querySelector(".search-box").classList.remove("show");
                cancelIcon.value = "";
                $("body").css("overflow", "auto");
            });
    });
});

    // document
    //     .querySelector("#mobile-search")
    //     .addEventListener("click", function(e) {
    //         e.preventDefault();
    //         console.log("Clicked");
    //         document.querySelector(".search-box").classList.add("show");
    //         $("body").css("overflow", "hidden");

    //         document
    //             .querySelector(".overlay")
    //             .addEventListener("click", function() {
    //                 document.querySelector(".search-box").classList.remove("show");
    //                 $("body").css("overflow", "auto");
    //             });
    //         document
    //             .querySelector(".cancel-icon")
    //             .addEventListener("click", function() {
    //                 document.querySelector(".search-box").classList.remove("show");
    //                 $("body").css("overflow", "auto");
    //             });
    //     });

    // Footer Collapsible menu
    var acc = document.querySelectorAll(".footer-links .title");
    var i;
    for (i = 0; i < acc.length; i++) {
        acc[i].onclick = function() {
            this.classList.toggle("active");
            // var panel = this.nextElementSibling;
            // console.log(panel.scrollHeight, "height")
            // if (panel.style.maxHeight || panel.style.maxHeight==""){
            //   panel.style.maxHeight = null;
            // } else {
            //   panel.style.maxHeight = panel.scrollHeight + "px";
            // }
        };
    }





    if (body.dataset.title == "faq-page") {
        var acc = document.querySelectorAll(".title");
        var i;
        for (i = 0; i < acc.length; i++) {
            acc[i].onclick = function() {
                this.classList.toggle("active");
                // var panel = this.nextElementSibling;
                // console.log(panel.scrollHeight, "height");
                // if (panel.style.maxHeight || panel.style.maxHeight == "") {
                //   panel.style.maxHeight = null;
                // } else {
                //   panel.style.maxHeight = panel.scrollHeight + "px";
                // }
            };
        }
    }

    /**if (body.dataset.title == "index") {
      // Video Play
      var video = document.querySelector("#video");
      var playBtn = document.querySelector(".play-btn");
      playBtn.addEventListener("click", function () {
        video.play();
        playBtn.classList.add("hide");
      });
      var video = document.querySelector("#video-one");
      var playBtn = document.querySelector(".play-btn-white");
      playBtn.addEventListener("click", function () {
        video.play();
        playBtn.classList.add("hide");
      });
    }**/

    if (body.dataset.title == "case-study-page") {
        const imagesContainer = document.querySelector(".case-study-images ul");
        const imagesScrollWidth = imagesContainer.scrollWidth;
        window.addEventListener("load", () => {
            self.setInterval(() => {
                if (imagesContainer.scrollLeft !== imagesScrollWidth) {
                    console.log(imagesContainer.scrollLeft, imagesScrollWidth);
                    imagesContainer.scrollTo(imagesContainer.scrollLeft + 800, 0);
                } else if (imagesContainer.scrollLeft !== imagesScrollWidth) {
                    imagesContainer.scrollTo(imageContainer.scrollRight - 100, 0);
                }
            }, 2000);
        });
    }


    

    $(".steps-container ul.list").owlCarousel({
        loop: false,
        margin: 0,
        autoplay: false,
        nav: true,
        navText: [
            "<img class='carousel-control-left carousel-control'  style='height:70px;margin-top:70px' src='./assets/a1.png' alt=''>",
            "<img class='carousel-control-right carousel-control'  style='height:70px;margin-top:70px' src='./assets/a2.png' alt=''>",
        ],
        dots: false,
        responsive: {
            0: {
                items: 1,
            },
            700: {
                items: 2,
            },
            1000: {
                items: 3,
            },
            1200: {
                items: 6,
                nav: false,
            },

        },
    });


    if (body.dataset.title == "index" || "product-page") {
        // Products Carousel
        function owlInitialize() {
            if ($(window).width() > 1023) {
                $('.owl-one').addClass("owl-carousel");
                $(".owl-one").owlCarousel({
                    stagePadding: 260,
                    loop: true,
                    margin: 0,
                    autoplay: true,
                    autoplayTimeout: 2000,
                    autoplayHoverPause: true,
                    nav: true,
                    navText: [
                        "<img class='carousel-control-left carousel-control'  style='height:70px;margin-top:-70px' src='./assets/a2.png' alt=''>",
                        "<img class='carousel-control-right carousel-control'  style='height:70px;margin-top:-70px' src='./assets/a1.png' alt=''>",
                    ],
                    dots: false,
                    responsive: {
                        100: {
                            items: 2,
                        },
                        600: {
                            items: 2,
                        },
                        1000: {
                            items: 3,
                        },
                    },
                });
            }else{
                $('.owl-one').owlCarousel('destroy');
                $('.owl-one').removeClass("owl-carousel");
            }
            }
            $(document).ready(function(e) {
            owlInitialize();
            });
            $(window).resize(function() {
            owlInitialize();
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
                "<img class='carousel-control-left carousel-control' style='height:70px;margin-top:-330px' src='./assets/a2.png' alt=''>",
                "<img class='carousel-control-right carousel-control' style='height:70px;margin-top:-330px' src='./assets/a1.png' alt=''>",
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
    }

    var pagesWithWhiteNav = [
        "case-study-page",
        "care-program-page",
        "about-us-page",
    ];
    if (pagesWithWhiteNav.indexOf(body.dataset.title) > -1) {
        $(window).scroll(function() {
            try {
                // var searchIcon = document.querySelector(".search");
                if ($(document).scrollTop() > 60) {
                    //$("#navbar-fixed-top").css("background-color", "#f8f8f8");
                    //$("#navbar-fixed-top nav a").css("color", "#6A3D45");
                    //$("h1 img").attr("src", "./assets/logo.svg");
                    // searchIcon.classList.add("search-white");
                    //$("#mobile-search img").attr("src", "./assets/search.svg");
                    //$(".hamburger-menu img").attr("src", "./assets/hamburger-menu.svg");
                    //$(".mobile-call img").attr("src", "./assets/call.svg");
                } else {
                    //$("#navbar-fixed-top").css("background-color", "transparent");
                    //$("#navbar-fixed-top nav a").css("color", "#ffffff");
                    //$("h1 img").attr("src", "./assets/white-tulio-logo-large.svg");
                    // searchIcon.classList.remove("search-white");
                    //$("#mobile-search img").attr("src", "./assets/white-search.svg");
                    //$(".hamburger-menu img").attr("src","./assets/white-hamburger-menu.svg");
                    //$(".mobile-call img").attr("src", "./assets/white-call.svg");

                    document
                        .querySelector("header")
                        .addEventListener("mouseout", function() {
                            console.log("Triggered", body.dataset.title);
                            //$("#navbar-fixed-top").css("background-color", "#f8f8f8");
                            //$("#navbar-fixed-top nav a").css("color", "#6A3D45");
                            //$("h1 img").attr("src", "./assets/logo.svg");
                            // searchIcon.classList.add("search-white");
                            //$("#mobile-search img").attr("src", "./assets/search.svg");
                            //$(".hamburger-menu img").attr("src","./assets/hamburger-menu.svg");
                            //$(".mobile-call img").attr("src", "./assets/call.svg");
                        });
                }
            } catch (error) {
                console.error(error);
            }
        });

        document.querySelector("header").addEventListener("mouseover", function() {
            //$("#navbar-fixed-top").css("background-color", "#f8f8f8");
            //$("#navbar-fixed-top nav a").css("color", "#6A3D45");
            //$("h1 img").attr("src", "./assets/logo.svg");
            // searchIcon.classList.add("search-white");
            //$("#mobile-search img").attr("src", "./assets/search.svg");
            //$(".hamburger-menu img").attr("src", "./assets/hamburger-menu.svg");
            //$(".mobile-call img").attr("src", "./assets/call.svg");
        });

        document.querySelector("header").addEventListener("mouseout", function() {
            console.log("Triggered", body.dataset.title);
            //$("#navbar-fixed-top").css("background-color", "transparent");
            // $("#navbar-fixed-top nav a").css("color", "#ffffff");
            //$("h1 img").attr("src", "./assets/white-tulio-logo-large.svg");
            // searchIcon.classList.remove("search-white");
            //$("#mobile-search img").attr("src", "./assets/search.svg");
            //$(".hamburger-menu img").attr("src", "./assets/hamburger-menu.svg");
            //$(".mobile-call img").attr("src", "./assets/call.svg");
        });

        const imagesContainer = document.querySelector(".case-study-images ul");
        const imagesScrollWidth = imagesContainer.scrollWidth;
        window.addEventListener("load", () => {
            self.setInterval(() => {
                if (imagesContainer.scrollLeft !== imagesScrollWidth) {
                    imagesContainer.scrollTo(imagesContainer.scrollLeft + 800, 0);
                } else if (imagesContainer.scrollLeft !== imagesScrollWidth) {
                    imagesContainer.scrollTo(imageContainer.scrollRight - 100, 0);
                }
            }, 2000);

            console.log(imagesContainer, "container");
            console.log(imagesScrollWidth, "scroll width");
            console.log(imagesContainer.scrollLeft, "scroll left");
        });
    }
});

//Load
window.addEventListener("load", function(event) {
    try {
        var banner = document.querySelector(".banner");
        if (banner) {
            banner.classList.add("image-settle");
        }
    } catch (error) {
        console.error(error);
    }
});

// Steps Container
const liLength = document.querySelector(".steps-container ul li");

$(document).ready(function() {
    var $item = $(".steps-container ul .item"),
        visible = 1,
        index = 0,
        endIndex = $item.length / visible - 1;

    $("#step-right-arrow").click(function() {
        if (index < endIndex) {
            index++;
            $item.animate({ left: `-=${liLength}` });
        }
    });

    $("#step-left-arrow").click(function() {
        if (index > 0) {
            index--;
            $item.animate({ left: `+=${liLength}` });
        }
    });
});