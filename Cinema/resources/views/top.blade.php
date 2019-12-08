@extends('layouts.principal')
	@section('content')
				<div class="header">
				<div class="top-header">
				<div class="logo">
					<p><a href="{!!URL::to('/login')!!}">Iniciar Sesion</a>  - Peliculas - Cinema a tu alcance</p>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="reviews-section">
				<h3 class="head">Top de Peliculas - Categoria</h3>
					<div class="col-md-9 reviews-grids">
					<div class="review">
					{!!Form::open(['url'=>'top/genero', 'method'=>'POST'])!!}
					{!!Form::label('Genero','Genero:')!!}
					{!!Form::select('genre_id',$genres)!!}
					{!!Form::submit('Buscar',['class'=>'btn btn-primary'])!!}
					{!!Form::close()!!}
					</div>
					@if($movies != null )
					@foreach($movies as $movie)
							<div class="review">
								<div class="movie-pic">
									<img src="/movies/{{$movie->path}}" alt="" />
								</div>
								<div class="review-info">
									<a class="span" href="single.html"> 
									<i>{{$movie->name}}</i></a>
									<p class="info">ELENCO:&nbsp;&nbsp;{{$movie->cast}}</p>
									<p class="info">DIRECTOR:&nbsp;&nbsp;{{$movie->direction}}</p>
									<p class="info">GENERO:&nbsp;&nbsp;{{$movie->genre}}</p>
									<p class="info">DURACION:&nbsp;&nbsp;{{$movie->duration}}</p>
									<p class="info">CALIFICACION:&nbsp;&nbsp;{{$movie->valor}}&nbsp;&nbsp;de 5.0</p>
								</div>
								<div class="clearfix"></div>
								
							</div>
						@endforeach
						@endif

					</div>


					<div class="clearfix"></div>
			</div>
			</div>	
	@endsection