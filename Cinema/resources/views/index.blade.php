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
				<h3 class="head">Catalogo de Peliculas</h3>
					<div class="col-md-9 reviews-grids">
					@foreach($movies as $movie)
							<div class="review">
								<div class="movie-pic">
									<img src="movies/{{$movie->path}}" alt="" />
								</div>
								<div class="review-info">
									<a class="span" href="single.html"> 
									<i>{{$movie->name}}</i></a>
									<p class="info">CASTIN:&nbsp;&nbsp;{{$movie->cast}}</p>
									<p class="info">DIRECTOR:&nbsp;&nbsp;{{$movie->direction}}</p>
									<p class="info">GENERO:&nbsp;&nbsp;{{$movie->genre}}</p>
									<p class="info">DURACION:&nbsp;&nbsp;{{$movie->duration}}</p>
								</div>
								<div class="review-info">
								{!!Form::open(['route'=>'calificacion.store', 'method'=>'POST'])!!}
									{!!Form::hidden('id_movie', $movie->id)!!}
									{!!Form::label('Correo electronico','Correo Electronico:')!!}
									{!!Form::text('email',null,['class'=>'form-control', 'placeholder'=>'Ingresa tu correo'])!!}
									{!!Form::label('Calificacion','Calificacion:')!!}
									{!!Form::select('valor',[1, 2, 3, 4, 5])!!}
									{!!Form::submit('Calificar',['class'=>'btn btn-primary'])!!}
								{!!Form::close()!!}
								</div>
								<div class="clearfix"></div>
								
							</div>
						@endforeach

					</div>


					<div class="clearfix"></div>
			</div>
			</div>	
	@endsection