@extends("admin.template.main")

@section("title","Listado de Artículos")

@section("Logo_Conte","glyphicon glyphicon-duplicate")
@section("Info_Conte","Lista de Artículos")

@section("content")
	<a href="{{ route('articles.create') }}" class="btn btn-info"> Registrar Nuevo Artículo</a>
{{-- Buscar de Articulos--}}
 
 	{!! Form::open(["route"=>"articles.index","method"=>"GET","class"=>"navbar-form pull-right"])!!}
		
		<div class="input-group">			
			{!! Form::text("title",null,["class"=>"form-control","placelhoder"=>"Buscar Tag","aria-describedby"=>"Buscador"])!!}
			<span class="input-group-addon" id='Buscador'>
				<span class='glyphicon glyphicon-search' ></span>
			</span>
		</div>
		

 	{!! Form::close()!!}

	{{-- Fin Buscar de tags--}}
	<table class="table table-hover table-striped table-bordered">
  		<tr>
  			<td><b>ID</b></td>
  			<td><b>Title</b></td>
  			<td><b>Categoria</b></td>
  			<td><b>Usuario</b></td>  			
  			<td><b>Acción</b></td>
		</tr>
		@foreach($articles as $article)
			<tr>
				<td> {{ $article->id }}</td>
				<td> {{ $article->title }}</td>
				<td> {{ $article->category->name }}</td>
				<td> {{ $article->user->name }}</td>
				<td> 
					<a href="{{ route('articles.destroy', $article->id."/destroy" ) }}" class="btn btn-danger" onclick="return confirm('¿Seguro que Desea Eliminarlo?') "> <span class="glyphicon glyphicon-trash"></span></a> 
					<a href="{{route('articles.edit',$article->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
				</td>
			</tr>
		@endforeach
	</table>
	{!! $articles->render()!!}
	{{-- Y haci es para mostar de una vez una paginacion sencilla --}}
@endsection