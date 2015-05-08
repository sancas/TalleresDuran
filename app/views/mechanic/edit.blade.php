@extends('master')

@section('content')

<div class="row">
	<div class="span offset1">
		<div class="well">
			<h4>Editar Mecanico</h4>
			{{ Form::model($user, array('route' => array('mechanic.update', $user->id), 'method' => 'PATCH'), array('role' => 'form')) }}
				@if($errors->any())
				<div class="alert alert-error">
					<a href="#" class="close" data-dismiss="alert">&times;</a>
					{{ implode('', $errors->all('<li class="error">:message</li>')) }}
				</div>
				@endif
				{{ Form::text('username', $user->username, array('class' => 'form-control', 'placeholder' => 'Username', 'readonly' => 'true')) }}
				{{ Form::text('email', $user->email, array('class' => 'form-control', 'placeholder' => 'Email')) }}
				{{ Form::text('name', $user->name, array('class' => 'form-control', 'placeholder' => 'Nombre')) }}
				{{ Form::text('lastname', $user->lastname, array('class' => 'form-control', 'placeholder' => 'Apellido')) }}
				{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}<br />
				{{ Form::submit('Editar', array('class' => 'btn btn-success')) }}
				{{ HTML::link('owner/mechanic', 'Cancelar', array('class' => 'btn btn-danger')) }}<br>
			{{ Form::close() }}
		</div>
	</div>
</div>


@stop