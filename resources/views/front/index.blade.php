@extends("front.template.main")

@section("title","front")
@section("Logo_Conte","glyphicon glyphicon-home")

@section("content")
	
	@foreach($articles as $article)
		<div class="col-md-6">
			<div class="panel panel-primary">
  				
  				<div class="panel-body">
					<img class="img-responsive" src="{{asset('images/articles/'.$article->images->name) }}" alt="">
  				</div>
  				<h4 class="text-center">{{ $article->title}}</h4>  				
  				<div class="panel-footer panel-info">
  					<a href="{{route('front.buscador.category',$article->category->name)}}"><span class="glyphicon glyphicon-folder-open"></span> {{ $article->category->name}}</a>
  				</div>
  				<div class="pull-right">
  					<span class="glyphicon glyphicon-eye-open"> {{ $article->created_at->diffForHumans()}}</span> Creado.
  				</div>
  			</div>
		</div>	
	@endforeach
	{{-- diffForHumans() es la manipulacion de fecha con el paquete carbon --}}

@endsection