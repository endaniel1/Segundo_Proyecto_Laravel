@extends("admin.template.main")

@section("title","Crear Tags")

@section("Logo_Conte","glyphicon glyphicon-book")
@section("Info_Conte","Registar Tag")


@section("content")
	{!! Form::open(["route"=>"tags.store","method"=>"POST","class"=>"form-horizontal"])!!}
		<table width="50%" border="0" align="center" cellpadding="5" cellspacing="5">
			<br />  			
			<tr>
  				<td width="30%">
  					<div align="right" style="padding-right:4%;">
  						<b>{!! Form::label("name","Nombre")!!}:</b>
  					</div>
  				</td>
  				<td>
  					{!! Form::text("name",null,["class"=>"form-control","placeholder"=>"Nombre del Tag","required","style"=>"width:80%;"])  !!}
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