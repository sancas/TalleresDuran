@extends('master')

@section('content')


<div class="row">
	<div class="span offset1">
		<div class="well">
			@if(Auth::user())
			<legend>Ya estas logeado</legend>
			@else
			<legend>Logeate por favor</legend>
			{{ Form::open(array('url' => 'login')) }}
			@if($errors->any())
			<div class="alert alert-error">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				{{ implode('', $errors->all('<li class="error">:message</li>')) }}
			</div>
			@endif
			{{ Form::label('email', 'Correo Electronico', array('class' => 'sr-only'))}}
			{{ Form::text('email', '', array('class' => 'form-control', 'placeholder' => 'Email')) }}
			{{ Form::label('password', 'Password', array('class' => 'sr-only')) }}
			{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}<br />
			{{ Form::submit('Login', array('class' => 'btn btn-success')) }}
			{{ HTML::link('register', 'Registrarse', array('class' => 'btn btn-primary')) }}<br /><br />
			{{ HTML::link('password/reset', 'Recuperar contraseña', array('class' => 'btn btn-danger')) }}
			{{ Form::close() }}
			@endif
		</div>
	</div>
</div>

@stop