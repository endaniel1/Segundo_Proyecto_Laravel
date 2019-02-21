<!DOCTYPE html>
<html>
<head>
	<title>Acceso Restringido</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css')}}">
</head>
<body>
	<div class="box-admin">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-warning">
  				<div class="panel-heading">
  					<div class="panel-title">Acceso Restringido</div>
  				</div>
			</div>
			<div class="panel-body">
    			<img class="img-responsive center-block" src="{{ asset('images/error_access.png') }}" alt="">
    			<hr>
    			<strong class="text-center">
    				<p class="text-center"> Usted No Tiene Acceso A Esta Zona</p>
    				<p>
    					<a href="{{ route('front.index') }}">Desea Volver Al Inicio?</a>
    				</p>
    			</strong>
  			</div>
		</div>
	</div>	
</body>
</html>