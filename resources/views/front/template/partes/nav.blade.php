<div style="padding-left: 5%; padding-right: 5%;">
	<nav class="navbar navbar-default ">
  		<div class="container-fluid">  			 
    		<div class="navbar-header"> 
          @auth{{--Verifico aqui si ay ususario autentificado--}}
            <a class="navbar-brand" href="{{route('admin.index')}}"><span class="glyphicon glyphicon-chevron-left"></span>Regresar</a>
            
          @endauth<!-- Y cerramos la consulta de autentificadion -->
    		 	@guest
            <a class="navbar-brand" href="https://codigofacilito.com">
              <img class="imagen" src="{{asset('images/Codigo_Facilito.png')}}" alt="Codigo_Facilito">
            </a>
    		 	@endguest
    		</div>
    		
    		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    			<ul class="nav navbar-nav navbar-right">
        			@guest<!-- Y aqui desidimos si no ay un usuario autentificado mostamos estoz parte -->
          				<li class="nav-item">
            				<a class="nav-link" href="{{ route('login') }}"><span class="glyphicon glyphicon-lock"></span> Iniciar Sección</a>
          				</li>
          				<li class="nav-item">
            			<a class="nav-link" href="{{ route('register') }}"><span class="glyphicon glyphicon-pencil"></span> Registrate</a>
          				</li>                 
        			@else<!-- Y sino mostramos los datos del ususrio autentificado-->
        			<li class="dropdown">
            			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre><span class="glyphicon glyphicon-user"></span> 
            			{{ Auth::user()->name }} <span class="caret"></span>
            			</a>
            			<ul class="dropdown-menu">
              				<li>
                				<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  					Cerrar Sección
                				</a>
                				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                				{{ csrf_field() }}
                				</form>
              				</li>
            			</ul>
        			</li>        
      			</ul>
    		</div>
    		@endguest<!-- Y cerramos la consulta de autentificadion -->     
  		</div>
	</nav>
</div>