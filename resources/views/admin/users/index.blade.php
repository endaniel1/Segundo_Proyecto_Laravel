@extends("admin.template.main")

@section("title","Listado de Usuario")

@section("Logo_Conte","glyphicon glyphicon-duplicate")
@section("Info_Conte","Lista de Usuarios")

@section("content")
	<a href="{{ route('users.create') }}" class="btn btn-info"> Registrar Nuevo Usuario</a>
	<table class="table table-hover table-striped table-bordered">
  		<tr>
  			<td><b>ID</b></td>
  			<td><b>Nombre</b></td>
  			<td><b>Correo</b></td>
  			<td><b>Tipo</b></td>
  			<td><b>Acción</b></td>
  		</tr>
  		@foreach($users as $user)
  			<tr>  			
				<td> {{$user->id}}</td>
				<td> {{$user->name}}</td>
				<td> {{$user->email}}</td>
				@if($user->type =="admin")
					<td><span class="label label-danger">{{$user->type}}</span></td>
					@elseif($user->type =="member")
					<td><span class="lbel label-primary">{{$user->type}}</span></td>
				@endif				
				<td> 
					<a href="{{ route('users.destroy', $user->id."/destroy" ) }}" class="btn btn-danger" onclick="return confirm('¿Seguro que Desea Eliminarlo?') "> <span class="glyphicon glyphicon-trash"></span></a> 
					<a href="{{route('users.edit',$user->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
				</td>
			</tr>
		@endforeach
	</table>
	{!! $users->render()!!}
	{{-- Y haci es para mostar de una vez una paginacion sencilla --}}

@endsection