@extends('layouts.app')
@section('content')
    <section class="fulfillment-center hotelier-portfolio">
        <div class="wrapper desktop-image contact-links">

            <center>
                <h2>Fulfilment Centres</h2>
                <p>Our centres help you see a project from conceptualisation to installation. With dedicated Relationship
                    Managers, Designers, <br>
                    Project Managers and technicians, our centres help us deliver what we promise
                </p>
                <p>&nbsp;</p>
                <p><a href="mailto:hello@tulio.design" class="">hello@tulio.design</a> &nbsp; | &nbsp; <a
                        href="tel:+919225555559" class="">INDIA +91 9225555559</a> &nbsp; | &nbsp; <a
                        href="tel:+971557093439" class="">UAE +971 55 709 3439</a> </p>
            </center>



        </div>
        <h2 style="padding-top: 25px;">Tulio Flagship Studios</h2>
        <ul style="margin: 0px 0 80px;" class="hotel-images" id="ourPortfolio">

            <li style="padding: 8px;">
                <a style="border: none">
                    <div class="image-container">
                        <picture>
                            <img loading="lazy" src="{{ asset('assets/bengaluru.png') }}" alt="">
                        </picture>
                    </div>
                    <h2 class="studio-heading">Bengaluru</h2>
                    <h6 style="text-align: left;padding-left: 5px;color: #666;
     font-size: 14px;line-height: 1.31;">
                        Shilton Heights<br>
                        Papanna Street<br>
                        Bengaluru - 560 001
                    </h6>
                    <p style="font-size:14px;margin-left:0%;bottom: 10px;text-align: left;padding-left: 5px;"
                        class="viewOnMap"><a style="font-family: 'Montserrat';" href="https://goo.gl/maps/d8dEdrjcbJ5A87UR9"
                            target="_blank">View on map</a></p>
                </a>
            </li>

            <li style="padding: 8px;">
                <a style="border: none">
                    <div class="image-container">
                        <picture>
                            <img loading="lazy" src="{{ asset('assets/pune.png') }}" alt="">
                        </picture>
                    </div>
                    <h2 class="studio-heading">Pune</h2>
                    <h6
                        style="text-align: left;padding-left: 5px;padding-bottom: 30px;color: #666;
     font-size: 14px;line-height: 1.31;">
                        204, ICC Trade Tower A<br>
                        Senapati Bapat Marg<br>
                        Pune - 411016
                    </h6>
                    <p style="font-size:14px;margin-left:0%;bottom: 10px;text-align: left;padding-left: 5px;"
                        class="viewOnMap"><a style="font-family: 'Montserrat';" href="https://goo.gl/maps/EeJCLqBATscv2NzX7"
                            target="_blank">View on map</a></p>
                </a>
            </li>

            <li style="padding: 8px;">
                <a style="border: none">
                    <div class="image-container">
                        <picture>
                            <img loading="lazy" src="{{ asset('assets/gurugram.png') }}" alt="">
                        </picture>
                    </div>
                    <h2 class="studio-heading">Gurugram</h2>
                    <h6
                        style="text-align: left;padding-left: 5px;color: #666;
              font-size: 14px;line-height: 1.31;">
                        230, Udyog Vihar<br>
                        Phase IV, Sector 18<br>
                        Gurugram - 122015</h6><br><br><br>
                    <p style="font-size:14px;margin-left:0%;bottom: 10px;text-align: left;padding-left: 5px;"
                        class="viewOnMap"><a style="font-family: 'Montserrat';" href="https://goo.gl/maps/Wvqy5h4DxWzh4LY16"
                            target="_blank">View on map</a></p>
                </a>
            </li>

            <li style="padding: 8px;">
                <a style="border: none">
                    <div class="image-container">
                        <picture>
                            <img loading="lazy" src="{{ asset('assets/dubai.png') }}" alt="">
                        </picture>
                    </div>
                    <h2 class="studio-heading">Dubai</h2>
                    <h6
                        style="text-align: left;padding-left: 5px;padding-bottom: 40px;color: #666;
     font-size: 14px;line-height: 1.31;">
                        1011, The Onyx Tower 1<br>
                        Sheikh Zayed Road<br>
                        Dubai, UAE.
                    </h6>
                    <p style="font-size:14px;margin-left:0%;text-align: left;padding-left: 5px;" class="viewOnMap"><a
                            style="font-family: 'Montserrat';" href="https://goo.gl/maps/YmYQh2MLwCsFu9Y76"
                            target="_blank">View on map</a></p>
                </a>
            </li>

            <li style="padding: 8px;">
                <a style="border: none">
                    <div class="image-container">
                        <picture>
                            <img loading="lazy" src="{{ asset('assets/mumbai-laxmi-park.png') }}" alt="">
                        </picture>
                    </div>
                    <h2 class="studio-heading">Mumbai</h2>
                    <h6
                        style="text-align: left;padding-left: 5px;padding-bottom: 40px;color: #666;
   font-size: 14px;line-height: 1.31;">
                        Unit No. 30, Ground Floor, B-Wing, <br>
                        Laxmi Business Park, Laxmi Industrial Estate, <br>
                        New Link Road, Andheri (West), Mumbai-400053<br>
                    </h6>
                    <p style="font-size:14px;margin-left:0%;text-align: left;padding-left: 5px;" class="viewOnMap"><a
                            style="font-family: 'Montserrat';" href="https://goo.gl/maps/F7qzgWEBevXuk3tW7"
                            target="_blank">View on map</a></p>
                </a>
            </li>


        </ul>
        <h2 style="padding-top: 25px;">Tulio Partner Studios</h2>
        <ul style="margin: 0px 0 80px;">
            <li style="padding: 8px;">
                <a style="border: none">
                    <div class="image-container">
                        <picture>
                            <img loading="lazy" src="{{ asset('assets/mumbai.png') }}" alt="">
                        </picture>
                    </div>
                    <h2 class="studio-heading">Mumbai</h2>
                    <h6 style="text-align: left;padding-left: 5px;color: #666;
     font-size: 14px;line-height: 1.31;">
                        Mahalaxmi Industrial <br>
                        Estate, Gandhi Nagar<br>
                        Worli, Mumbai - 400013
                    </h6>
                    <p style="font-size:14px;margin-left:0%;bottom: -40px;text-align: left;padding-left: 5px;"
                        class="viewOnMap"><a style="font-family: 'Montserrat';" href="https://goo.gl/maps/D7smq77yQ8XbmGte9"
                            target="_blank">View on map</a></p>
                </a>
            </li>
        </ul>
    </section>
@endsection
