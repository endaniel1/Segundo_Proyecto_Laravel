@extends("admin.template.main")

@section("title","Crear Articulos")

@section("Logo_Conte","glyphicon glyphicon-book")
@section("Info_Conte","Agregar Articulos")

@section("content")
	{!! Form::open(["route"=>"articles.store","method"=>"POST","files"=>true])!!}
		<table width="60%" border="0" align="center" cellpadding="5" cellspacing="5">
			<tr>
  				<td width="30%">
  					<div align="right" style="padding-right:4%;">
  						<b>{!! Form::label("title","Título")!!}:</b>
  					</div>
  				</td>
  				<td>
  					{!! Form::text("title",null,["class"=>"form-control","placeholder"=>"Titulo de Artículo","required","style"=>"width:80%;"])  !!}
  				</td>
  			</tr>
  			<tr>
  				<td width="30%">
  					<div align="right" style="padding-right:4%;">
  						<b>{!! Form::label("category_id","Categoria")!!}:</b>
  					</div>
  				</td>
  				<td align="left">
  					{!! Form::select("category_id",$categories,null,["class"=>"form-control select-category","required","style"=>"width:80%;"])  !!}
  				</td>
  			</tr>  			
  			<tr>
  				<td width="30%" style="vertical-align:text-top;">
  					<div align="right" style="padding-right:4%;">
  						<b>{!! Form::label("content","Contenido")!!}:</b>
  					</div>
  				</td>
  				<td>
  					{!! Form::textarea("content",null,["class"=>"form-control textarea-content","required","style"=>"width:80%;"]) !!}
  				</td>
  			</tr>
  			<tr>
  				<td width="30%" style="vertical-align:text-top;">
  					<div align="right" style="padding-right:4%;">
  						<b>{!! Form::label("tags","Tags")!!}:</b>
  					</div>
  				</td>
  				<td align="left">
  					{!! Form::select("tags[]",$tags,null,["class"=>"form-control select-tag","required","style"=>"width:80%;","multiple"])  !!}
  				</td>
  			</tr>
  			<tr>
  				<td width="30%" style="vertical-align:text-top;">
  					<div align="right" style="padding-right:4%;">
  						<b>{!! Form::label("image","Imagen")!!}:</b>
  					</div>
  				</td>
  				<td>
  					{!! Form::file("image",["class"=>"multi-file"])  !!}
  				</td>
  			</tr>
  			<tr>
				<td align="right">
					<div class="form-group">
						{!! Form::button("<span class='glyphicon glyphicon-send'></span> Agregar Articulo",["type"=>"submit","class"=>"btn btn-success btn-sm"])!!}
					</div>
				</td>
				<td align="center">
					<div class="form-group">
						{!! Form::button(" <span class='glyphicon glyphicon-remove-circle'></span> Vaciar",["type"=>"reset","class"=>"btn btn-danger btn-sm"]) !!}

					</div>
				</td>
			</tr> 
		</table>
	{!! Form::close()!!}
@endsection
@section("js")
	<script>
		$(".select-tag").chosen({
			placeholder_text_multiple:"Selecione un Maximo de 3 Tags",
			max_selected_options:3,
			no_results_text:"No se Encuentra Resultados"
		});
		$(".select-category").chosen({
			
		});

		//aqui para utilizar la libreria trumbowyg
		$(".textarea-content").trumbowyg({});


    //$(".multi-file").MultiFile({});
	</script>
@endsection