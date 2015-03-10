@extends('master')

@section('content')

<div class="row">
	<div class="span offset1">
		<div class="well">
			<h4>Editar Cliente</h4>
			{{ Form::model($user, array('route' => array('customer.update', $user->id), 'method' => 'PATCH'), array('role' => 'form')) }}


			
				@if($errors->any())
				<div class="alert alert-error">
					<a href="#" class="close" data-dismiss="alert">&times;</a>
					{{ implode('', $errors->all('<li class="error">:message</li>')) }}
				</div>
				@endif
				{{ Form::text('username', $user->username, array('placeholder' => 'Username', 'readonly' => 'true')) }}<br>
				{{ Form::text('email', $user->email, array('placeholder' => 'Email')) }}<br>
				{{ Form::text('name', $user->name, array('placeholder' => 'Nombre')) }}<br>
				{{ Form::text('lastname', $user->lastname, array('placeholder' => 'Apellido')) }}<br>
				{{ Form::password('password', array('placeholder' => 'Password')) }}<br>
				{{ Form::submit('Editar', array('class' => 'btn btn-success')) }}
				{{ HTML::link('owner/customer', 'Cancelar', array('class' => 'btn btn-danger')) }}<br>
			{{ Form::close() }}
		</div>
	</div>
</div>


@stop