@extends('master')

@section('content')

<div class="row">
	<div class="span offset1">
		<div class="well">
			<h4>Editar Trabajo</h4>
			{{ Form::model($trabajo, array('route' => array('trabajo.update', $trabajo->id), 'method' => 'PATCH'), array('role' => 'form')) }}

				@if($errors->any())
				<div class="alert alert-error">
					<a href="#" class="close" data-dismiss="alert">&times;</a>
					{{ implode('', $errors->all('<li class="error">:message</li>')) }}
				</div>
				@endif
				{{ Form::text('tipo', $trabajo->tipo, array('class' => 'form-control', 'placeholder' => 'Tipo')) }}
				{{ Form::text('descripcion', $trabajo->descripcion, array('class' => 'form-control', 'placeholder' => 'Descripcion')) }}
				{{ Form::text('estado', $trabajo->estado, array('class' => 'form-control', 'placeholder' => 'Estado')) }}
				{{ Form::text('costo', $trabajo->costo, array('class' => 'form-control', 'placeholder' => 'Costo')) }}<br />
				{{ Form::submit('Editar', array('class' => 'btn btn-success')) }}
				{{ HTML::link('mechanic/customers', 'Cancelar', array('class' => 'btn btn-danger')) }}<br>
			{{ Form::close() }}
		</div>
	</div>
</div>


@stop