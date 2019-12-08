@extends('layouts.principal')
	@section('content')
	@include('alerts.errors')
	@include('alerts.request')
				<div class="header">
			<div class="top-header">
				<div class="logo">
					<p><a href="{!!URL::to('/login')!!}">Iniciar Sesion</a>  - Peliculas - Cinema a tu alcance</p>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="header-info">
				<h1>Inicia Sesión</h1>
				{!!Form::open(['route'=>'log.store', 'method'=>'POST'])!!}
					<div class="form-group">
						{!!Form::label('correo','Correo:')!!}	
						{!!Form::email('email',null,['class'=>'form-control', 'placeholder'=>'Ingresa tu correo'])!!}
					</div>
					<div class="form-group">
						{!!Form::label('contrasena','Contraseña:')!!}	
						{!!Form::password('password',['class'=>'form-control', 'placeholder'=>'Ingresa tu contraseña'])!!}
					</div>
					{!!Form::submit('Iniciar',['class'=>'btn btn-primary'])!!}
				{!!Form::close()!!}
			</div>
		</div>
	@endsection	