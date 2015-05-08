@extends('master')

@section('content')


<div class="row">
	<div class="span4 offset1">
		<div class="well">
			@if (Session::has('error'))
			  {{ trans(Session::get('reason')) }}
			@endif
			 
			{{ Form::open(array('route' => array('password.update', $token))) }}
			{{ Form::text('email', '', array('class' => 'form-control', 'placeholder' => 'Email')) }}
			{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
			{{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Confirmar Password')) }}<br />
			{{ Form::hidden('token', $token) }}
			{{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
			 
			{{ Form::close() }}
		</div>
	</div>
</div>

@stop