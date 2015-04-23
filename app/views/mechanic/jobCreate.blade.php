@extends('master')

@section('content')

<div class="row">
	<div class="span offset1">
		<div class="well">
			<h4>Crear Trabajo</h4>
			{{ Form::open(array('url' => "mechanic/customers/" . $customerid . "/car/" . $carid . "/addjob")) }}
			@if($errors->any())
			<div class="alert alert-error">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				{{ implode('', $errors->all('<li class="error">:message</li>')) }}
			</div>
			@endif
			{{ Form::text('tipo', '', array('placeholder' => 'Tipo')) }}<br>
			{{ Form::text('descripcion', '', array('placeholder' => 'Descripcion')) }}<br>
			{{ Form::text('estado', '', array('placeholder' => 'Estado')) }}<br>
			{{ Form::text('costo', '', array('placeholder' => 'Costo')) }}<br>
			{{ Form::submit('Crear', array('class' => 'btn btn-success')) }}
			{{ HTML::link("mechanic/customers/" . $customerid . "/car/" . $carid, 'Cancelar', array('class' => 'btn btn-danger')) }}<br>
			{{ Form::close() }}
		</div>
	</div>
</div>


@stop