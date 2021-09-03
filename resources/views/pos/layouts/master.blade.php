<!DOCTYPE html>

@php
	$configData = Helper::applClasses();
@endphp

<html lang="en" data-textdirection="ltr" class="">

<head>
	<meta charset=" utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0" />
	<meta name="csrf-token" content="{{ csrf_token() }}" />

	<title>Point of Sale</title>
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo/favicon.ico') }}" />
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

	<link rel="stylesheet" href="{{ asset(mix('vendors/css/vendors.min.css')) }}" />
	<link rel="stylesheet" href="{{ asset(mix('vendors/css/ui/prism.min.css')) }}" />
	<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/nouislider.min.css')) }}" />
	<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}" />
	<link rel="stylesheet" href="{{ asset(mix('css/core.css')) }}" />

	<link rel="stylesheet" href="{{ asset(mix('css/base/core/menu/menu-types/vertical-menu.css')) }}" />
	<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sliders.css')) }}" />
	<link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-ecommerce.css')) }}" />
	<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}" />

	<link rel="stylesheet" href="{{ asset(mix('css/overrides.css')) }}" />
	<link rel="stylesheet" href="{{ asset(mix('css/style.css')) }}" />
		@livewireStyles
</head>

<body class="vertical-layout vertical-menu-modern 2-columns navbar-floating menu-expanded footer-static" data-layout="" data-menu="vertical-menu-modern" data-col="2-columns" style="" data-framework="laravel" data-asset-path="{{ asset('/') }}">
	
	@include('panels.navbar')

	<!-- BEGIN: Content-->
	<div class="app-content content ecommerce-application" style="margin-left: 0px !important;">
		<!-- BEGIN: Header-->
		<div class="content-overlay"></div>

		<div class="header-navbar-shadow"></div>

		<div class="content-wrapper">
			@yield('content')
		</div>
	</div>
	<!-- End: Content-->
 
	<div class="sidenav-overlay"></div>
	<div class="drag-target"></div>

	@include('panels.footer')

	<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
	@livewireScripts
	<script src="{{ asset(mix('vendors/js/vendors.min.js')) }}"></script>
	<script src="{{ asset(mix('vendors/js/ui/prism.min.js')) }}"></script>

	<script src="{{ asset(mix('vendors/js/extensions/wNumb.min.js')) }}"></script>
	<script src="{{ asset(mix('vendors/js/extensions/nouislider.min.js')) }}"></script>
	<script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>

	<script src="{{ asset(mix('js/core/app-menu.js')) }}"></script>
	<script src="{{ asset(mix('js/core/app.js')) }}"></script>

	<script type="text/javascript">
		$(window).on('load', function() {
			if (feather) {
				feather.replace({
					width: 14
					, height: 14
				})
			}
		})
	</script>
</body>
</html>
