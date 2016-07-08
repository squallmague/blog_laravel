@extends('layouts.admin')

@section('content')
	@include('alerts.request')
	{!!Form::open(['route'=>'usuario.store', 'method'=>'POST'])!!}
		@include('usuario.forms.usr')
		{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}


<!-- 	<form action="">
		<div class="form-group">
			<label for="">Nombre</label>
			<input type="text" class="form-control">
		</div>
		<div class="form-group">
			<label for="">Correo</label>
			<input type="text" class="form-control">
		</div>
		<div class="form-group">
			<label for="">Contraseña</label>
			<input type="password" class="form-control">
		</div>
		<button class="btn btn-primary">Registrar</button>
	</form> -->

@stop