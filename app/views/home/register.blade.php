@extends('master')

@section('content')

<div class="row">
	<div class="span offset1">
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
			{{ Form::text('username', '', array('class' => 'form-control', 'placeholder' => 'Username')) }}
			{{ Form::text('email', '', array('class' => 'form-control', 'placeholder' => 'Email')) }}
			{{ Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'Nombre')) }}
			{{ Form::text('lastname', '', array('class' => 'form-control', 'placeholder' => 'Apellido')) }}
			{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}<br>
			{{ Form::submit('Registrarse', array('class' => 'btn btn-success')) }}
			{{ HTML::link('/', 'Cancelar', array('class' => 'btn btn-danger')) }}<br>
			{{ Form::close() }}
			@endif
		</div>
	</div>
</div>


@stop