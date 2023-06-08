@extends('layouts.app')

@section('style')

<link rel="stylesheet" href="{{asset('styles/about-us.css')}}"/>

</style>

@endsection

@section('content')

 <!-- Banner -->
    <section class="banner about-page">
      <div class="banner-image-container position-absolute desktop-image-container">
        <img src="./assets/live/About-Us-Banner.jpg" alt="" />
      </div>

      <div class="wrapper">
        <div class="content" style="text-align:left;">
          <h2 id="bannerheading" style="">
Crafting happiness <br> since 1990
          </h2>
        </div>
      </div>
    </section>



    <!-- Banner end -->

    <!-- About Tulio -->
    <section class="about-tulio">
      <div class="wrapper">
        <center>
        <h2>TULIO</h2>
        <p>Our brand name is derived from the ‘Tul’ of Tulips and ‘io’ of input-output</p>
        </center>

        <h3 style="color: #333" class="center">Tul&nbsp;&nbsp;+&nbsp;&nbsp;IO</h3>
        <div class="row flex-box">
          <div class="col right-align">
            <p>Our journey began in 1990, under the brand name Tulips,
              offering bespoke services for curtains
              and blinds to a discerning clientele. Started as a
              passion project by home maker Raajkumarri Mutha,
              Tulips quickly became the brand of choice for the
              architects and interior designers community.</p>
          </div>
          <div class="col left-align">
            <p>In its new avatar, Tulio is the new, technology
                enabled, design-led, made-to-measure model
                focusing completely on servicing the needs of its
                architect and interior designer community by
                providing textile solutions to further enhance the
                beautiful spaces they design.</p>
          </div>
        </div>



        <?php /*
        <ul>
          <li>
            <div class="image-container">
              <img data-src="{{asset('assets/about1.svg')}}" alt="" class="lazy" />
            </div>
            <div class="content">
              <div class="tulio-logo">
                <div class="image-container">
                  <img src="{{asset('assets/about-us-tulio.svg')}}" alt="" />
                </div>
                <p class="title">Tulip + IO</p>
              </div>
              <div class="text">
                <p>
                  We are a company that has been crafting made-to-measure home
                  furnishings, providing turnkey design and production solutions
                  for bespoke curtains, upholstery, bed linen, etc.
                </p>
                <p>
                  We closely liaise with architects and interior designers in
                  realizing their concepts for textiles within their projects,.
                  Be it a home, hotel, office, palace, government organization
                  or mock-up flat, our expert team of designers and technicians
                  can execute projects of any scale, style, and scheme.
                </p>
              </div>
            </div>
          </li>
          <li>
            <div class="image-container">
              <img data-src="{{asset('assets/about2.svg')}}" alt="" class="lazy" />
            </div>
            <div class="content">
              <p class="title">Our Heritage</p>
              <p class="text">
                We have endeavoured to deliver our expertise to homes & hotels
                across the world since 1990. Bringing together ancestral
                artistry and contemporary techniques to bring beautiful and
                enduring products to life.
              </p>
            </div>
          </li>
          <li>
            <div class="image-container">
              <img data-src="{{asset('assets/about3.svg')}}" alt="" class="lazy" />
            </div>
            <div class="content">
              <p class="title">Our Expertise</p>
              <p class="text">
                Curtain-making is our métier and we are constantly adapting and
                honing it, to be able to tailor-make curtains that are uniquely
                individual and faithful to our clients’ creative visions.
              </p>
            </div>
          </li>
          <li class="founder">
            <div class="image-container">
              <img data-src="{{asset('assets/about4.svg')}}" alt="" class="lazy" />
            </div>
            <div class="content">
              <p class="title">Founder’s Note</p>
              <div class="text">
                <p>
                  The experience which my team and I have gathered at Tulips
                  while working on thousands of residences and hotels over the
                  years is what has culminated into ‘Tulio’
                </p>
                <p>
                  Tulio is more than a curtains and blinds brand - it is a
                  lifestyle that embodies appreciation of great design, of
                  little details, of ethical fabrics, of artists and craftsmen
                  who put their everything into the products they create.
                </p>
                <p>
                  The soul and spirit of Tulio is based on how effortlessly
                  these products blend in the beautiful structures created by
                  the best minds in design. I hope all the architects and
                  interior designers who stumble upon this from anywhere in the
                  world enjoy using this and home owners draw inspiration and
                  allow us to add a little bit of us in their lives.
                </p>
                <p class="founder-name">Rajkumari Mutha</p>
                <p>Founder</p>
              </div>
            </div>
          </li>
          <li>
            <p class="title">Tulio Portal</p>
            <p class="text">
              We value Design & Designers and hence we are proud to Introduce a
              modern platform for Architects & Interior designers to acquire
              desirable home furnishings for their clients
            </p>
            <a href="" class="cta-links">Explore Tulio Portal</a>
          </li>
        </ul> */ ?>
      </div>
    </section>

    <section class="foundersec">
      <div class="row flex-box">
        <div class="col span_6"><img src="{{asset('assets/ceo.jpg')}}" alt=""></div>
        <div class="col span_6">

          <h2>Founder's Note</h2>
          <p>The experience that my team and I have gathered at Tulips while working on thousands of
              residences and hotels over the years is what has culminated into ‘Tulio’</p>

              <p> Tulio is more than a curtains and blinds brand - it is a lifestyle that embodies an appreciation
              of great design, of little details, of ethical fabrics, of artists and craftsmen who put their
              everything into the products we create.</p>

              <p>The soul and spirit of Tulio are based on our proprietary design products and perfected service
              delivery. How effortlessly these products blend with the beautiful structures created by the best
              minds in design is something I’m really proud of.</p>

              <p>I hope all our architect and interior designer partners from across the world enjoy using the
              Tulio platform and homeowners draw inspiration and allow us to add a little bit of our essence
              into their lives.</p>

              <h4 style="color: #333">Raajkumarri Mutha</h4>
              <p class="fname">FOUNDER</p>

        </div>
      </div>
    </section>

   <!--  <section class="about-tulio">
      <div class="wrapper">
        <center>
          <h2>Tulio Portal</h2>
          <p>We value design and designers hence, we are proud to introduce a modern platform for Architects and Interior Designers to acquire <br>
            striking home furnishings for their clients</p>
          <a href="{{route('designer')}}" class="cta-button-black">Explore Tulio Portal</a>
        </center>

      </div>
    </section> -->


    <!-- <section class="two-cta-section">
      <div class="cta-section-container">
        <div class="section-one">
          <img src="{{asset('assets/care-cta.svg')}}" alt="" />
          <div class="wrapper">
            <h2>Experience our Products</h2>
            <a href="products.html" class="cta-button"
              >View Signature Products</a
            >
          </div>
        </div>
      </div>
      <div class="cta-section-container">
        <div class="section-two">
          <img src="{{asset('assets/care-cta.svg')}}" alt="" />
          <div class="wrapper">
            <h2>Let’s Start Your Project Together</h2>
            <a href="#" class="cta-button">Get in Touch With Us</a>
          </div>
        </div>
      </div>
    </section> -->

    



@endsection

@section('script')
<script>
let c = document.cookie.split(";").reduce( (ac, cv, i) => Object.assign(ac, {[cv.split('=')[0]]: cv.split('=')[1]}), {});

console.log(c);
</script>
@endsection
