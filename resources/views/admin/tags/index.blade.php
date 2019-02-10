@extends("admin.template.main")

@section("title","Listado de Tags")

@section("Logo_Conte","glyphicon glyphicon-book")
@section("Info_Conte","Lista de Tag")

@section("content")
	<a href="{{ route('tags.create') }}" class="btn btn-info"> Registrar Nuevo Tag</a>
	{{-- Buscar de tags--}}
 
 	{!! Form::open(["route"=>"tags.index","method"=>"GET","class"=>"navbar-form pull-right"])!!}
		
		<div class="input-group">			
			{!! Form::text(" name",null,["class"=>"form-control","placelhoder"=>"Buscar Tag","aria-describedby"=>"Buscador"])!!}
			<span class="input-group-addon" id='Buscador'>
				<span class='glyphicon glyphicon-search' ></span>
			</span>
		</div>
		

 	{!! Form::close()!!}

	{{-- Fin Buscar de tags--}}
	<table class="table table-hover table-striped table-bordered">
		<tr>			
  			<td><b>ID</b></td>
  			<td><b>Nombre</b></td>

  			<td><b>Acción</b></td>
		</tr>
		@foreach($tags as $tag)
			<tr>
				<td>{{ $tag->id }}</td>
				<td>{{ $tag->name }}</td>				
				<td> 
					<a href="{{ route('tags.destroy', $tag->id."/destroy" ) }}" class="btn btn-danger" onclick="return confirm('¿Seguro que Desea Eliminarlo?') "> <span class="glyphicon glyphicon-trash"></span></a>
					<a href="{{route('tags.edit',$tag->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
				</td>
			</tr>
		@endforeach
	</table>
	{!! $tags->render()!!}
	{{-- Y haci es para mostar de una vez una paginacion sencilla --}}
@endsection