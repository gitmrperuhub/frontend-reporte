<!DOCTYPE html>
<html lang="en">
	<head><base href="../../../">
		<title>@yield('title')</title>
		<meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="SERVICIOS DE MANTENIMIENTO Y REPARACIÓN DE COMPRESORES DE AIRE, MR PERU," />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="SERVICIOS DE MANTENIMIENTO" />
		<meta property="og:url" content="{{config('app.APP_URL')}}" />
		<meta property="og:site_name" content="SERVICIOS DE MANTENIMIENTO | SERVICIOS DE MANTENIMIENTO" />
		<link rel="canonical" href="{{config('app.APP_URL')}}" />
		<link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.png')}}" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />
	</head>
	<body id="kt_body" class="bg-body">
		<div class="d-flex flex-column flex-root">
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<div class="d-flex align-items-center flex-lg-row-auto w-xl-600px positon-xl-relative far-conect-wrapper" >
					<div class="w-100">
						<div class="text-center  ">
							<img alt="Logo" src="{{asset('assets/media/logos/LogoMrPeruTransparente.png')}}" width="500" class=" min-h-100px min-h-lg-350px" />
						</div>
						<div class=" d-none d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px" style="background-image: url({{asset('assets/media/logos/favicon.png')}}"></div>
					</div>
				</div>
				<div class="d-flex flex-column flex-lg-row-fluid py-10">
					<div class="d-flex flex-center flex-column flex-column-fluid">
						<div class="w-lg-500px p-10 p-lg-15 mx-auto">

							@yield('content')
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>var hostUrl = "{{asset('assets/')}}";</script>
		<script>var APP_URL = "{{config('app.APP_URL')}}" ;</script>
        <script>var APP_ANGULAR_URL = "{{config('app.app_angular')}}" ;</script>
		<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
		<!--script src="{{asset('assets/js/custom/authentication/sign-in/general.js')}}"></script-->
		<script src="{{asset('assets/js/helpers.js')}}"></script>
		<script src="{{asset('assets/js/authentication.js')}}"></script>
		<script>

		</script>
	</body>
</html>
