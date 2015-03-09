@extends('master')

@section('content')

<div class="row">
	<div class="span4 offset1">
		<div class="well">
			@if(Auth::user())
			<legend>Ya iniciaste sesion</legend>
			@else
			<legend>Registrate por favor</legend>
			{{ Form::open(array('url' => 'register')) }}
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
			{{ Form::submit('Registrarse', array('class' => 'btn btn-success')) }}
			{{ HTML::link('/', 'Cancelar', array('class' => 'btn btn-danger')) }}<br>
			{{ Form::close() }}
			@endif
		</div>
	</div>
</div>


@stop