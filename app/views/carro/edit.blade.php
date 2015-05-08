@extends('master')

@section('content')

<div class="row">
	<div class="span offset1">
		<div class="well">
			<h4>Editar Trabajo</h4>
			{{ Form::model($carro, array('route' => array('carro.update', $carro->id), 'method' => 'PATCH'), array('role' => 'form')) }}


			
				@if($errors->any())
				<div class="alert alert-error">
					<a href="#" class="close" data-dismiss="alert">&times;</a>
					{{ implode('', $errors->all('<li class="error">:message</li>')) }}
				</div>
				@endif
				{{ Form::text('marca', $carro->marca, array('class' => 'form-control', 'placeholder' => 'Tipo')) }}
				{{ Form::text('placa', $carro->placa, array('class' => 'form-control', 'placeholder' => 'Descripcion')) }}
				{{ Form::text('tarjetaCirculacion', $carro->tarjetaCirculacion, array('class' => 'form-control', 'placeholder' => 'Estado')) }}<br />
				{{ Form::submit('Editar', array('class' => 'btn btn-success')) }}
				{{ HTML::link('mechanic/cars', 'Cancelar', array('class' => 'btn btn-danger')) }}<br>
			{{ Form::close() }}
		</div>
	</div>
</div>


@stop