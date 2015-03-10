@extends('master')

@section('content')

<div class="row">
	<div class="span offset1">
		<div class="well">
			<h4>Crear Mecanico</h4>
			{{ Form::open(array('url' => 'mechanic/create')) }}
			@if($errors->any())
			<div class="alert alert-error">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				{{ implode('', $errors->all('<li class="error">:message</li>')) }}
			</div>
			@endif
			{{ Form::text('username', '', array('placeholder' => 'Username')) }}<br>
			{{ Form::text('email', '', array('placeholder' => 'Email')) }}<br>
			{{ Form::text('name', '', array('placeholder' => 'Nombre')) }}<br>
			{{ Form::text('lastname', '', array('placeholder' => 'Apellido')) }}<br>
			{{ Form::password('password', array('placeholder' => 'Password')) }}<br>
			{{ Form::submit('Crear', array('class' => 'btn btn-success')) }}
			{{ HTML::link('owner/mechanic', 'Cancelar', array('class' => 'btn btn-danger')) }}<br>
			{{ Form::close() }}
		</div>
	</div>
</div>


@stop