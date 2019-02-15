<div class="row">
	<div class="col-lg-12 text-center">
		<div class="panel panel-primary">
			<div class="panel-heading">Categorias</div>
			<div class="panel-body">
				<ul class="list-group">
					@foreach($categories as $category)
					 	<li class="list-group-item">
    						<span class="badge">{{$category->articles->count()}}</span>
    						<a href="{{route('front.buscador.category',$category->name)}}">
    							{{$category->name}}
    						</a>
  						</li>
					@endforeach
					
				</ul>
			</div>
		</div>
	</div>
	<div class="col-lg-12 text-center">
		<div class="panel panel-success">
			<div class="panel-heading">Tags</div>
			<div class="panel-body">
				@foreach($tags as $tag)
					<span class="label label">
						<a href="{{route('front.buscador.tag',$tag->name)}}"> 
							{{ $tag->name}} 
						</a>
					</span>
				@endforeach
			</div>
		</div>
	</div>
</div>
{{-- de donde sale la variables tag y categories es de la vista q creamos con composer de los provider--}}	