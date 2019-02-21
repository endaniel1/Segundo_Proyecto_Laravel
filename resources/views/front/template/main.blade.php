<!DOCTYPE html>
<html>
<head>
	<title>@yield("title","Default")</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/general.css') }}">				

</head>
<body>
{{-- @include Incluye directamente el archivo espesificado--}}
	@include("front.template.partes.nav")

	<section id="Content">
		<div class="container">

			<div class="row">
				<div class="col-lg-12 text-center">
					<h2>
						<span class="@yield('Logo_Conte','glyphicon glyphicon-alert')"></span> @yield("titulo_logo","Vista Principal")
					</h2>
				<hr class="star-primary">
				</div>
			</div>

			<div class="row"  align="center">
				<div class="col-lg-8 text-center">
					@yield("content")
				</div>
				<div class="col-lg-4 aside">
					@include("front.template.partes.aside")				
				</div>
			</div>

		</div>
	</section>
	
		@include("admin.template.partes.footer")
		

	<script src="{{asset('plugins/jquery/js/jquery.js')}}"></script>
	<script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
	
	@yield("js")
</body>
</html>