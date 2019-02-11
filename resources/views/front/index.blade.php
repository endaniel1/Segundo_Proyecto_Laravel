@extends("front.template.main")

@section("title","front")

@section("content")
	
	@foreach($articles as $article)

		<div class="col-md-6">
			<div class="panel panel-primary">
  				<div class="panel-heading">{{ $article->title}}</div>
  				<div class="panel-body">
					<img class="img-responsive" src="{{asset('images/articles/'.$article->images->name) }}" alt="">
  				</div>
  				<div class="panel-footer panel-info">{{ $article->category->name}}</div>
  				
			</div>
		</div>	
	@endforeach

@endsection