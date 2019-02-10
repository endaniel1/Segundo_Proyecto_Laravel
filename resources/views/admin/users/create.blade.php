@extends("admin.template.main")

@section("title","Crear Usuario")

@section("Logo_Conte","glyphicon glyphicon-book")
@section("Info_Conte","Registar Usuario")


@section("content")

{{-- BUSCAR LA DOCUMENTACION DE LARAVELCOLLETIVE PARA ENTENDER MEJOR ESTO--}}

{{-- nO ES TA DIFICIL ENTEDER SOLO Q ANTES DE Y PARA Q FUNCIONE TODO ESTO SE TIENE Q DESCARGAR O INTALAR A EL PROYECTO LARAVELCOLLETIVE/HTML--}}
	{!! Form::open(["route"=>"users.store","method"=>"POST","class"=>"form-horizontal"])!!}
		<table width="50%" border="0" align="center" cellpadding="5" cellspacing="5">
			<br />  			
  			<tr>
  				<td width="30%">
  					<div align="right" style="padding-right:4%;">
  						<b>{!! Form::label("name","Nombre")!!}:</b>
  					</div>
  				</td>
  				<td>
  					{!! Form::text("name",null,["class"=>"form-control","placeholder"=>"Nombre Completo","required","style"=>"width:80%;"])  !!}
  				</td>
  			</tr>
  			<tr>
  				<td width="30%">
  					<div align="right" style="padding-right:4%;">
  						<b>{!! Form::label("email","Correo Electronico")!!}:</b>
  					</div>
  				</td>
  				<td>
  					{!! Form::email("email",null,["class"=>"form-control","placeholder"=>"Correo Electronico","required","style"=>"width:80%;"])  !!}
  				</td>
  			</tr>
			<tr>
  				<td width="30%">
  					<div align="right" style="padding-right:4%;">
  						<b>{!! Form::label("password","Contraseña")!!}:</b>
  					</div>
  				</td>
  				<td>
  					{!! Form::password("password",["class"=>"form-control","placeholder"=>"********","required","style"=>"width:80%;"])  !!}
  				</td>
  			</tr>
			<tr>
  				<td width="30%">
  					<div align="right" style="padding-right:4%;">
  						<b>{!! Form::label("type","Tipo")!!}:</b>
  					</div>
  				</td>
  				<td align="left">
  					{!! Form::select("type",[""=>"Seleccione un Nivel..","member"=>"Miembro","admin"=>"Administrador"],null,["class"=>"form-control select-type","required","style"=>"width:80%;"])  !!}
  				</td>
  			</tr>
			<tr>
				<td align="right">
					<div class="form-group">
						{!! Form::button("<span class='glyphicon glyphicon-send'></span> Registrar",["type"=>"submit","class"=>"btn btn-success btn-sm"])!!}
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
@section("js")
<script>
  $(".select-type").chosen({

  });
</script>
@endsection
