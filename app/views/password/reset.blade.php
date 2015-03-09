@extends('master')

@section('content')


<div class="row">
	<div class="span4 offset1">
		<div class="well">
			@if (Session::has('error'))
			  {{ trans(Session::get('reason')) }}
			@endif
			 
			{{ Form::open(array('route' => array('password.update', $token))) }}
			{{ Form::text('email', '', array('placeholder' => 'Email')) }}<br>
			{{ Form::password('password', array('placeholder' => 'Password')) }}<br>
			{{ Form::password('password_confirmation', array('placeholder' => 'Confirmar Password')) }}<br>
			{{ Form::hidden('token', $token) }}
			{{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
			 
			{{ Form::close() }}
		</div>
	</div>
</div>

@stop