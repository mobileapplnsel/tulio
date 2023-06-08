@extends('layouts.app')

@section('content')

<style>
        html .topic-section .title {
    font-size: 18px;
        }
</style>
<section class="faq-content">
    <div class="wrapper">
      <h2>Frequently Asked Questions</h2>
      <div class="topic-section">
        <p class="title">Company</p>
        <div class="content">
          <p class="question">What does the name Tulio mean?</p>
          <p class="text">
          Our brand name is derived from the ‘Tul’ of Tulips and ‘io’ of input-output. Tulips is the
          brand name under which this business has existed since 1990 offering bespoke services for
          curtains and blinds. In its new avatar, when we moved this business from traditional brick
          and mortar to omnichannel, we added ‘io’ which refers to input-output and is primarily how
          computers process data.
          </p>
          <p class="question">Where are your products made?</p>
          <p class="text">
          All Tulio products are made in our workroom in New Delhi, India. A lot of the processes and
          applications on these beautiful products are done at source in various craft clusters across
          the country and the world. For example, the hand painting on our Pichwai collection is done
          by a multi-generational artist family in Nathdwara, Rajasthan. Our Ikats are woven in a
          village called Pochampally in Andhra Pradesh, a state in Southern India. Our base fabrics
          come from manufacturers that work with ethically sourced natural fibers and okeotex
          certified polyesters. The cut and sew as well as many other craftwork like embroideries,
          pleating, etc happen under our watchful eyes before finally packing and shipping the
          products off to their rightful owners across the globe.
          </p>
          <p class="question">Where do I direct Press or Marketing inquiries?</p>
          <p class="text">
          For press or marketing inquiries, please send an email to <a style="color: #666" href="mailto:hello@tulio.design">hello@tulio.design</a>
          </p>
          <p class="question">
          Where do I direct inquiries regarding careers at Tulio?
          </p>
          <p class="text">
          For career inquiries, please send an email to <a style="color: #666" href="mailto:hello@tulio.design">hello@tulio.design</a>
          </p>

          
          
        </div>
      </div>

      <div class="topic-section">
        <p class="title">Curtains & Blinds</p>
        <p class="question">
          Do you have a measuring service?
          </p>
          <p class="text">
          Perfect measurements are the basis of well-finished curtains and blinds. We have a ground
          support team across most locations and our technician will come over for a site survey and
          measurements.

          </p>
        
        <p class="question">How do I measure curtains and blinds if I’m located at a location where you don’t have a
ground services team?</p>
        <p class="text">
        Please refer to our document which gives you precise and easy to follow instructions on
        how to measure windows for perfect curtains and blinds
        </p>
        <p class="question">Can I physically see samples before I order?</p>
        <p class="text">
        Our material libraries are available to all leading architects and interior designers across the
        markets we serve. In case we are unavailable at your architect or interior designer or if you
        are doing a project yourself, please reach out to us at <a style="color: #666" href="mailto:hello@tulio.design">hello@tulio.design</a> and our team will
        service your requirements immediately. Alternatively, you could also fill in the contact us
        form on the webpage and we shall get in touch with you.
        </p>
        <p class="question">
        How do you calculate the price of your curtains and blinds?
        </p>
        <p class="text">
        Our curtains and blinds are displayed on our product pages with a
        price for a standard size. This size is based on our statistical
        computation of common average window sizes in homes. However you
        will know the exact price of your curtains or blinds when you input
        the width and height and select the components you need. The website
        will automatically price your product for you.
        </p>
        <p class="question">
        What about curtain/blind rails, tracks and motors?
        </p>
        <p class="text">
        Tulio is a full services company and believes in delivering the final product, installed and
finished to its clients. We have a range of rails and tracks that can be purchased along with
the curtains and blinds. If you fancy motorization so that you are able to operate your
curtains and blinds via a remote or a home automation system, our technical team will
ensure this is done.
        </p>
        <p class="question">
        Will your team install these curtains and blinds?
        </p>
        <p class="text">
        Yes indeed. We believe in installing and draping our curtains and blinds followed by a round
of steam ironing, ensuring that the home is all prepped up for having friends and family
        </p></div>
      </div>

      <div class="topic-section">
      <div class="wrapper">
        <p class="title">Orders</p>
        <div class="content"><p class="question">What method of payments do you accept?</p>
        <p class="text">
        We accept payments by credit/debit cards as well as online transfers via net banking. On
        rare occasions when these modes of payment are not available, you can pay via cheque
        which can be couriered to our accounts and finance team at our head office located in
        Gurgaon. All orders confirmed by cheque are processed subject to realization.

        </p>
        <p class="question">Can I change my billing name and address?</p>
        <p class="text">
        Once you make your payment, you will receive an automated email confirmation with the
specifics of your order.
        </p>
        <p class="question">How will I know my order is confirmed?</p>
        <p class="text">
        Once you make your payment, you will receive an automated email confirmation with the
specifics of your order.
        </p>
        <p class="question">What if I need to add more items to my order?</p>
        <p class="text">
        We would be happy to add items to your order and the same would be treated as a new,
        independent order for logistical purposes.

        </p>
        <p class="question">Where can I buy your products?</p>
        <p class="text">
        Our products are available to all leading architects and interior designers in all the markets
        that we service. In case we are unavailable as your architect or interior designer or if you are
        doing a project yourself, please reach out to us at hello@tulio.design and our team will
        service your requirements immediately. Alternatively, you could also fill in the contact us
        form on the webpage and we shall get in touch with you.

        </p>
        <p class="question">Will I be charged local taxes?</p>
        <p class="text">
        The prices of all our products are exclusive of local taxes. As you enter the product size and
        select the options, the price you will see on the screen will be inclusive of freight &
        installation but exclusive of local taxes.
        </p>
        <p class="question">How do I cancel my order?</p>
        <p class="text">
        We would be unable to cancel your order once it has been confirmed via a payment as
        these products are made to measure for your home
        </p>
        <p class="question">How do I check the status of my order?</p>
        <p class="text">
        All order milestones will be shared with you via an email or text message so that you are
updated with their progress.
        </p>
        <p class="question">What is your return policy?</p>
        <p class="text">
        We are unable to accept any returns as these products are made to measure for you. In case
of any defects or issues, the project manager handling your project will take appropriate
measures to ensure that we deliver what we have promised
        </p></div>

      </div>
      </div>

      <div class="topic-section">
      <div class="wrapper">
        <p class="title">Shipping</p>
        <div class="content"><p class="question">Where does Tulio ship?</p>
        <p class="text">
        Tulio ships across all pin codes both domestically as well as internationally
        </p>
        <p class="question">How is my order shipped?</p>
        <p class="text">Your order is shipped via road or air depending on the geography of our curtain workroom
          based out of Delhi. We have partnered with Delhivery, Ship Rocket, DHL, and Blue Dart for
          all our shipping requirements.
        </p>
        <p class="question">Can I change my shipping address?</p>
        <p class="text">
        All goods will be directly shipped from our factory to the site location where these curtains
        and blinds have to be installed. In case you want to change the shipping location for some
        reason, you could contact our team member servicing you for the same. However, you
        would have to reship these goods to the site for installation
        </p>
        <p class="question">How much does shipping cost?</p>
        <p class="text">
        We provide free domestic ground shipping across India. Global shipping will be calculated
        on a real-time basis before you confirm your order.

        </p>
        <p class="question">Where can I buy your products?</p>
        <p class="text">
        Our products are available to all leading architects and interior designers in all the markets
        that we service. In case we are unavailable as your architect or interior designer or if you are
        doing a project yourself, please reach out to us at hello@tulio.design and our team will
        service your requirements immediately. Alternatively, you could also fill in the contact us
        form on the webpage and we shall get in touch with you.
        </p>
        <p class="question">When will I get my order?</p>
        <p class="text">
        Based on the size of your project and the complexity of the selected products, we will
        calculate and let you know a tentative delivery date. However, please expect a 6 to 8-week
        lead time for residential projects.
        </p></div>
</div>
      </div>

      <div class="topic-section">
      <div class="wrapper">
        <p class="title">Architects + Interior Designers</p>
        <div class="content"><p class="question">
        How do I become a Tulio Architect + Interior Designer Partner?
        </p>
        <p class="text">
        <span class="bold"><a style="color: #666" href="#"> Click here</a></span> to complete your application. We would endeavor to get back to you within 24
hours for onboarding so that you can start working on your project board as soon as
possible.

        </p>
        <p class="question">
        What qualifies for an Architect + Interior Designer Partner Programme?
        </p>
        <p class="text">
        Our program is open to architects, interior designers and other design professionals with
valid credentials.
        </p>
       
        <p class="question">Is this a complete self service portal?</p>
        <p class="text">
          No, your Tulio relationship manager will be updated on every step and will be involved in
          ensuring successful project completion. They have been trained to provide discreet service
          and intervene only when you need them to. Alternatively, you are free to complete the
          process yourself if you prefer to do so. No, your Tulio relationship manager will be updated
          on every step and will be involved in ensuring successful project completion. They have
          been trained to provide discreet service and intervene only when you need them to.
          Alternatively, you are free to complete the process yourself if you prefer to do so.

        </p>
        <p class="question">
        What about physical site measurements for my projects?
        </p>
        <p class="text">
        Critical steps like measurements will be verified physically at the site by our team. In case
        there is a discrepancy between measurements entered by your team and the physical
        measurements, we shall update the same after discussing it with you.

        </p>
        <p class="question">
        What about physical samples and fabric swatches?
        </p>
        <p class="text">
        In case you select a design for which you do not have a physical sample or swatch, please do
        let your relationship manager know and we shall share this with you.

        </p>
        <p class="question">What about client coordination?</p>
        <p class="text">
        After your project board is ready, we would be happy to visit your client's location or invite
        them over to our studio* to show them the selected or shortlisted curtains and blinds.
        *Studios available in select locations
        </p>
        <p class="question">How do I confirm an order?</p>
        <p class="text">
        After iterations, once you as well as the client are happy with the design as well as the cost
        proposal, we shall share a payment link with the client to process the payment and confirm
        the order
        </p>
        <p class="question">Is there a minimum order value?</p>
        <p class="text">No, there is no minimum order value</p></div>
      </div>
</div>

      <div class="topic-section">
      <div class="wrapper">
        <p class="title">Hospitality</p>
        <div class="content"><p class="question">
        What is the difference between residential and hospitality curtains and blinds?
        </p>
        <p class="text">
        Unlike our residential line, our hotel-grade curtains and blinds can withstand commercial
        laundering and are made to keep fire safety, stain resistance, and housekeeping needs in
        mind.

        </p>
        <p class="question">
        Do you provide certification for fire and stain resistance?
        </p>
        <p class="text">
        Yes, we regularly provide certificates as per established international safety codes. This is
applicable for hotels/commercial projects.

        </p>
        <p class="question">What is the lead time for hospitality orders?</p>
        <p class="text">
        Our hospitality projects can be completed in 12 to 24 weeks depending on the size of the
        hotel, location as well as operational complexities.
        </p>
        <p class="question">Who is eligible to be a hospitality partner?</p>
        <p class="text">
        Our hospitality program is open to Developers, Hotel Managers, and Design Professionals
        who would like to partner with us to ensure that the entire process from fabric
        manufacturing to site installation is professionally executed within given timelines and
        budgets
        </p>
        <p class="question">How do I become a hospitality partner?</p>
        <p class="text">
        <span class="bold"><a style="color: #666" href=""> Click here</a></span> to complete our hospitality application. You will receive a notification of your
membership within two working days
        </p></div>
</div>
      </div>

      <div class="topic-section">
      <div class="wrapper">
        <p class="title">Trade</p>
        <div class="content"><p class="question">
        Can I partner with Tulio to extend ground services in an unserviced location?
        </p>
        <p class="text">
        Yes, we would be keen to explore the possibilities of partnerships. Please <a style="color: #666" href=""> click here</a> to fill in
our trade application and we would be happy to get on to a call to discuss this further.

        </p>
        <p class="question">
        What benefits will I get as a Tulio trade partner?
        </p>
        <p class="text">
        We have multiple options to suit various levels of investments as well as scenarios. From
shop-in-shop models to franchisee-owned franchisee-operated opportunities, we can share
them with you once we know what is that you are expecting.
        </p></div>
      </div>
</div>
    </div>
  </section>

  <style>
    section.faq-content {margin-bottom: 50px;}
  </style>
            
@endsection