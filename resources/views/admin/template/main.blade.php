<!DOCTYPE html>
<html>
<head>
	<title>@yield("title","Default") | de Administracion</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">	
	<link rel="stylesheet" type="text/css" href="{{ asset('css/general.css') }}">	
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/chosen_v1.8.7/chosen.css') }}">	
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/trumbowyg/ui/trumbowyg.css') }}">	

</head>
<body>
{{-- @include Incluye directamente el archivo espesificado--}}
	@include("admin.template.partes.nav")

	<section id="Content">
		<div class="container">

			<div class="row">
				<div class="col-lg-12 text-center">
					<h2>
						<span class="@yield('Logo_Conte','glyphicon glyphicon-alert')"></span> @yield("Info_Conte","Registar Default") 
					</h2>
				<hr class="star-primary">
				</div>
			</div>

			<div class="row"  align="center">
				<div class="col-lg-12 text-center">
					{{-- Y aqui imcluimos a el paquete flash para los mensaje de acciones q se muestran --}}
					@include('flash::message')
					
					@include("admin.template.parteS.errors")

					{{-- @yield Ies como si estuvieramos definiendo una parte del archivo para luego q sea llamada y despues se pueda modificar el la vista--}}
					@yield("content")
				</div>
			</div>
		</div>
	</section>
	
		@include("admin.template.partes.footer")
		

	<script src="{{asset('plugins/jquery/js/jquery.js')}}"></script>
	<script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
	<script src="{{asset('plugins/chosen_v1.8.7/chosen.jquery.js')}}"></script>
	<script src="{{asset('plugins/trumbowyg/trumbowyg.js')}}"></script>
	<script src="{{asset('plugins/multifile-master/jquery.MultiFile.js')}}"></script>
	@yield("js")
</body>
</html>