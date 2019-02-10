@extends("admin.template.main")

@section("title","Editar Articulos".$article->title)

@section("Logo_Conte","glyphicon glyphicon-book")
@section("Info_Conte","Editar Articulos")

@section("content")
	{!! Form::open(["route"=>["articles.update",$article],"method"=>"PUT"])!!}
		<table width="60%" border="0" align="center" cellpadding="5" cellspacing="5">
			<tr>
  				<td width="30%">
  					<div align="right" style="padding-right:4%;">
  						<b>{!! Form::label("title","Título")!!}:</b>
  					</div>
  				</td>
  				<td>
  					{!! Form::text("title",$article->title,["class"=>"form-control","placeholder"=>"Titulo de Artículo","required","style"=>"width:80%;"])  !!}
  				</td>
  			</tr>
  			<tr>
  				<td width="30%">
  					<div align="right" style="padding-right:4%;">
  						<b>{!! Form::label("category_id","Categoria")!!}:</b>
  					</div>
  				</td>
  				<td align="left">
  					{!! Form::select("category_id",$categories,$article->category->id,["class"=>"form-control select-category","required","style"=>"width:80%;"])  !!}
  				</td>
  			</tr>  			
  			<tr>
  				<td width="30%" style="vertical-align:text-top;">
  					<div align="right" style="padding-right:4%;">
  						<b>{!! Form::label("content","Contenido")!!}:</b>
  					</div>
  				</td>
  				<td>
  					{!! Form::textarea("content",$article->content,["class"=>"form-control textarea-content","required","style"=>"width:80%;"]) !!}
  				</td>
  			</tr>
  			<tr>
  				<td width="30%" style="vertical-align:text-top;">
  					<div align="right" style="padding-right:4%;">
  						<b>{!! Form::label("tags","Tags")!!}:</b>
  					</div>
  				</td>
  				<td align="left">
  					{!! Form::select("tags[]",$tags,$mi_tags,["class"=>"form-control select-tag","required","style"=>"width:80%;","multiple"])  !!}
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
		$(".textarea-content").trumbowyg();
	</script>
@endsection