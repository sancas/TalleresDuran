@extends('master')

@section('content')

<div class="row">
	<div class="span offset1">
		<div class="well">
			<h4>Añadir un Carro</h4>
			{{ Form::open(array('url' => 'carro/create')) }}
			@if($errors->any())
			<div class="alert alert-error">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				{{ implode('', $errors->all('<li class="error">:message</li>')) }}
			</div>
			@endif
			{{ Form::text('user_id', '', array('class' => 'form-control', 'placeholder' => 'ID Usuario')) }}
			{{ Form::text('marca', '', array('class' => 'form-control', 'placeholder' => 'Marca')) }}
			{{ Form::text('placa', '', array('class' => 'form-control', 'placeholder' => 'Placa')) }}
			{{ Form::text('tarjetaCirculacion', '', array('class' => 'form-control', 'placeholder' => 'Tarjeta de Circulacion')) }}<br />
			{{ Form::submit('Crear', array('class' => 'btn btn-success')) }}
			{{ HTML::link('mechanic/cars', 'Cancelar', array('class' => 'btn btn-danger')) }}<br>
			{{ Form::close() }}
		</div>
	</div>
</div>


@stop