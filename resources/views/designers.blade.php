@extends('layouts.app')
@section('content')
<section  class="banner">
	<div id="demo1">
	   
	   <div class="slide">
	      <img loading="lazy" src="{{asset('assets/hotelier-banner-bg.png')}}" style="width:100%"/>
	      <div class="slide-desc" style="text-align:right">
	         <h2 style="text-align:right">From manufacturing fabric to final installation<br/>- the world's only company that is fully integrated.</h2>
	         <p style="text-align:right"></p>
	       <button onclick="bbutton(location.protocol,location.hostname,location.port,location.pathname, this.value)" class="cta-button" value="Explore Collection">Login</button>
	      </div>
	   </div>
	   <div class="slide">
	      <img loading="lazy" src="" style="width:100%"/>
	      <div class="slide-desc" style="text-align:right">
	         <h2 style="text-align:right">Biophilia Dreams</h2>
	         <p style="text-align:right">Hand-sketched by our artists in-house, Biophilia Dreams is our attempt to<br/>increase interaction between humans and nature for its psychological benefits.</p>
	       <button onclick="bbutton(location.protocol,location.hostname,location.port,location.pathname, this.value)" class="cta-button" value="Login">Explore Collection"</button>
	      </div>
	   </div>
	   <div class="slide">
	      <img loading="lazy" src="{{asset('assets/hotelier-banner-bg.png')}}" style="width:100%"/>
	      <div class="slide-desc" style="text-align:right">
	         <h2 style="text-align:right">From manufacturing fabric to final installation<br/>- the world's only company that is fully integrated.</h2>
	         <p style="text-align:right"></p>
	       <button onclick="bbutton(location.protocol,location.hostname,location.port,location.pathname, this.value)" class="cta-button" value="Login">Login</button>
	      </div>
	   </div>
	</div>

	
</section>
<section class="tulio-portal-desc">

	<div class="wrapper">
		<h2>Welcome to the Tulio Portal - Technology that simplifies</h2>
		<p>Enabling Architects & Interior Designers create furnishing themes for various spaces for their customers</p>
		<ul>
			<li>
				<div class="image-container">
					<img data-src="./assets/portal1.svg" alt="" class="lazy">
				</div>
				<div class="content">
					<p class="title">Browse Products</p>
					<p class="text">Choose from 5,000 elegant
						product designs combining traditional crafts with
						modern manufacturing all on our Online portal.</p>
				</div>
			</li>
			<li>
				<div class="image-container">
					<img data-src="./assets/portal2.svg" alt="" class="lazy">
				</div>
				<div class="content">
					<p class="title">discover prices
						without any hassle</p>
					<p class="text">Get the approximate value of each of our products directly after adding your customizations & window sizes</p>
				</div>
			</li>
			<li>
				<div class="image-container">
					<img data-src="./assets/portal3.svg" alt="" class="lazy">
				</div>
				<div class="content">
					<p class="title">Visualize Things Easily
						For Your Clients</p>
					<p class="text">Create project boards with shortlisted products and share it with the client to help them make decisions quickly by better visualising products and understanding the cost implications as well.</p>
				</div>
			</li>
			<li>
				<div class="image-container">
					<img data-src="./assets/portal4.svg" alt="" class="lazy">
				</div>
				<div class="content">
					<p class="title">A very dedicated Relationship manager</p>
					<p class="text">Enjoy the service of a dedicated relationship manager who can
						help you access all our services and processes. May it be
						managing your projects or coordinating with the client for you.</p>
				</div>
			</li>
		</ul>

</section>
@endsection