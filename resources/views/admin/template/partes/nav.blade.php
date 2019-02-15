
<div style="padding-left: 5%; padding-right: 5%;">
  
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="https://codigofacilito.com">Curso Codigo Facilito</a>
    </div>
    {{-- aqqui desimos si ay un unsuario autentificado mostamos estoz parte--}}
    @auth
    
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href=" {{ route('users.index') }}">Usuarios <span class="sr-only">(current)</span></a></li>
        <li class="active" ><a href="{{ route('categories.index')}}">Categorias</a></li>
        <li class="active" ><a href="{{ route('tags.index')}}">Tags</a></li>
        <li class="active" ><a href="{{ route('articles.index')}}">Articulos</a></li>
        <li class="active" ><a href="{{ route('admin.images.index')}}">Imagenes</a></li>
      </ul>
   @endauth <!-- Y aqui serramos   -->
      <ul class="nav navbar-nav navbar-right">
        @guest<!-- Y aqui desidimos si no ay un usuario autentificado mostamos estoz parte -->       
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}"><span class="glyphicon glyphicon-lock"></span> Iniciar Sección</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}"><span class="glyphicon glyphicon-pencil"></span> Registrate</a>
          </li>
        @else<!-- Y sino mostramos los datos del ususrio autentificado-->       
         <li class="active" ><a href="{{ route('front.index')}}"><span class="glyphicon glyphicon-home"></span> Inicio de Pagina</a></li>    
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
        @endguest<!-- Y cerramos la consulta de autentificadion -->     
      </ul>
    </div>   
   
  </div><!-- /.container-fluid  -->
</nav>
</div>