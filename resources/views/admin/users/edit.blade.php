@extends("admin.template.main")

@section("title","Editar Usuario")

@section("Logo_Conte","glyphicon glyphicon-pencil")
@section("Info_Conte","Editar Usuario ". $user->name)


@section("content")
{{-- BUSCAR LA DOCUMENTACION DE LARAVELCOLLETIVE PARA ENTENDER MEJOR ESTO--}}

{{-- nO ES TA DIFICIL ENTEDER SOLO Q ANTES DE Y PARA Q FUNCIONE TODO ESTO SE TIENE Q DESCARGAR O INTALAR A EL PROYECTO LARAVELCOLLETIVE/HTML--}}
	{!! Form::open(["route"=>['users.update', $user],"method"=>"PUT","class"=>"form-horizontal"])!!}
		<table width="50%" border="0" align="center" cellpadding="5" cellspacing="5">
			<br />
  			<tr>
    			<td align="center"  colspan="3"></td>
  			</tr>
  			<tr>
  				<td width="30%">
  					<div align="right" style="padding-right:4%;">
  						<b>{!! Form::label("name","Nombre")!!}:</b>
  					</div>
  				</td>
  				<td>
  					{!! Form::text("name",$user->name,["class"=>"form-control","placeholder"=>"Nombre Completo","required","style"=>"width:80%;"])  !!}
  				</td>
  			</tr>
  			<tr>
  				<td width="30%">
  					<div align="right" style="padding-right:4%;">
  						<b>{!! Form::label("email","Correo Electronico")!!}:</b>
  					</div>
  				</td>
  				<td>
  					{!! Form::email("email",$user->email,["class"=>"form-control","placeholder"=>"Correo Electronico","required","style"=>"width:80%;"])  !!}
  				</td>
  			</tr>
  				<td width="30%">
  					<div align="right" style="padding-right:4%;">
  						<b>{!! Form::label("type","Tipo")!!}:</b>
  					</div>
  				</td>
  				<td>
  					{!! Form::select("type",[""=>"Seleccione el Nivel a Cambiar...","member"=>"Miembro","admin"=>"Administrador"],$user->type,["class"=>"form-control","required","style"=>"width:80%;"])  !!}
  				</td>
  			</tr>
			<tr>
				<td align="right">
					<div class="form-group">
						{!! Form::button("<span class='glyphicon glyphicon-send'></span> Editar",["type"=>"submit","class"=>"btn btn-success btn-sm"])!!}
					</div>
				</td>
				<td align="center">
					<div class="form-group">
						{!! Form::button(" <span class='glyphicon glyphicon-remove-circle'></span> Reset",["type"=>"reset","class"=>"btn btn-danger btn-sm"]) !!}

					</div>
				</td>
			</tr>
		</table>
	{!! Form::close()!!}

@endsection
