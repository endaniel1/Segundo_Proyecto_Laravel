@extends("admin.template.main")

@section("title","Lista de Categorias")

@section("Logo_Conte","glyphicon glyphicon-duplicate")
@section("Info_Conte","Lista de Categorias")

@section("content")

	<a href="{{ route('categories.create') }}" class="btn btn-info"> Registrar Nueva Categoria</a>
	
	<table class="table table-hover table-striped table-bordered">
  		<tr>
  			<td><b>ID</b></td>
  			<td><b>Nombre</b></td>
  			<td><b>Acción</b></td>
		</tr>
		@foreach($categories as $category)
			<tr>
				<td> {{ $category->id }}</td>
				<td> {{ $category->name }}</td>
				<td> 
					<a href="{{ route('categories.destroy', $category->id."/destroy" ) }}" class="btn btn-danger" onclick="return confirm('¿Seguro que Desea Eliminarlo?') "> <span class="glyphicon glyphicon-trash"></span></a> 
					<a href="{{route('categories.edit',$category->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
				</td>
			</tr>
		@endforeach
	</table>
	{!! $categories->render()!!}
	{{-- Y haci es para mostar de una vez una paginacion sencilla --}}
@endsection