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

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="{{ asset('images/favicon.jpg') }}">

	<title>Tulio Admin</title>

	<link href="{{asset('admins/css/app.css')}}" rel="stylesheet">
	<link href="{{asset('admins/css/custom.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	@yield('style')
    @livewireStyles
</head>

<body>
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5CZ3J2C"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
          <span class="align-middle">Tulio Admin</span>
        </a>

				<ul class="sidebar-nav">
					
					<li class="sidebar-item {{request()->is('admin/dashboard')?'active':''}}">
						<a class="sidebar-link" href="{{route('admin.dashboard')}}">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
					</li>
                    
                    <li class="sidebar-item {{request()->is('admin/product*')?'active':''}}">
						<a class="sidebar-link" href="{{route('admin.product.index')}}">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Products</span>
            </a>
					</li>

					<li class="sidebar-item {{request()->is('admin/technique*')?'active':''}}">
                        <a class="sidebar-link" href="{{route('admin.technique.index')}}">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Techniques</span>
            </a>
                    </li>   

                    <li class="sidebar-item {{request()->is('admin/ambience*')?'active':''}}">
                        <a class="sidebar-link" href="{{route('admin.ambience.index')}}">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Ambiences</span>
            </a>
                    </li>   

                    <li class="sidebar-item {{request()->is('admin/design*')?'active':''}}">
                        <a class="sidebar-link" href="{{route('admin.design.index')}}">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Designs </span>
            </a>
                    </li>

					<li class="sidebar-item {{request()->is('admin/category*')?'active':''}}">
						<a class="sidebar-link" href="{{route('admin.category.index')}}">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Categories</span>
            </a>
					</li>

				    <li class="sidebar-item {{request()->is('admin/colour*')?'active':''}}">
						<a class="sidebar-link" href="{{route('admin.colour.index')}}">
			<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Colours
			</span>
			</a>
					</li>

					<li class="sidebar-item {{request()->is('admin/user*')?'active':''}}">
						<a class="sidebar-link" href="{{route('admin.user.index')}}">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Users</span>
            </a>
					</li>	
					<li class="sidebar-item {{request()->is('admin/project*')?'active':''}}">
						<a class="sidebar-link" href="{{route('admin.project.index')}}">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Projects</span>
            </a>
					</li>	

				    <li class="sidebar-item {{request()->is('admin/newslisting*')?'active':''}}">
						<a class="sidebar-link" href="{{route('admin.newslisting.index')}}">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Newsletters</span>
            </a>
					</li>

				    <li class="sidebar-item {{request()->is('admin/hotelier*')?'active':''}}">
						<a class="sidebar-link" href="{{route('admin.hotelier.index')}}">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Hoteliers</span>
            </a>
					</li>	
					<li class="sidebar-item {{request()->is('admin/sliders*')?'active':''}}">
						<a class="sidebar-link" href="{{route('admin.slides.index')}}">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Sliders</span>
            </a>
					</li>	

					<li class="sidebar-item {{request()->is('admin/signature_products*')?'active':''}}">
                        <a class="sidebar-link" href="{{route('admin.signature_products.index')}}">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Signature Products</span>
            </a>
                    </li>	
							
				</ul>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						{{-- <li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator">4</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									4 New Notifications
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-danger" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Update completed</div>
												<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
												<div class="text-muted small mt-1">30m ago</div>
											</div>
										</div>
									</a>									
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all notifications</a>
								</div>
							</div>
						</li> --}}
						
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                				<i class="align-middle" data-feather="settings"></i>
              				</a>
              				<a href="https://tulio.design" class="btn btn-primary d-none d-sm-inline-block">Website</a>
							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
								<span class="text-dark">{{auth()->user()->name}}</span>
							</a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="{{route('admin.profile')}}"><i class="align-middle me-1" data-feather="user"></i> Profile</a>								
								<div class="dropdown-divider"></div>
								{!! Form::open(['route'=>'logout','method'=>'POST']) !!}
								<button class="dropdown-item" type="submit">Log out</button>
								{!! Form::close() !!}
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				@yield('content')
			</main>
<span style="display:flex;justify-content: center;padding-bottom: 10px;font-size:14px">&copy; <script type="text/javascript">document.write(new Date().getFullYear());</script> , Tulips Ambbience Furnishing LLC Developed &amp; Maintained by: <a href="https://lnsel.com/" target="_blank" >Lee & Nee Softwares (Exports) Ltd.</a></span>
			
		</div>
	</div>

	<script src="{{asset("admins/js/app.js")}}"></script>

	@livewireScripts
	@yield('script')

</body>

</html>