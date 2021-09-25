<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	

		<title>The Society 32</title>	

		<meta name="keywords" content="HTML5 Template" />
		<meta name="description" content="Porto - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Favicon -->
		<link rel="shortcut icon" href="{{ asset('images/logo/favicon.ico') }}" type="image/x-icon" />
		<link rel="apple-touch-icon" href="{{ asset('images/logo/favicon.ico') }}">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

		<!-- Web Fonts  -->
		<link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet" type="text/css">

		@include('partials.styles')
	</head>
	<body>

		<div class="body">
			@include('partials.header')

			<div role="main" class="main">

				@yield('content')

			</div> 

			@include('partials.footer')
		</div>

		@include('partials.scripts')

	</body>
</html>
