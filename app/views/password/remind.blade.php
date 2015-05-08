@extends('master')

@section('content')


<div class="row">
	<div class="span4 offset1">
		<div class="well">
			@if (Session::has('error'))
			  {{ trans(Session::get('reason')) }}
			@elseif (Session::has('success'))
			  <p>Un email con el link para resetear el password ha sido enviado</p>
			@endif
			{{ Form::open(array('route' => 'password.request')) }}
			{{ Form::text('email', '', array('class' => 'form-control','placeholder' => 'Email')) }}<br>
			{{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
			{{ Form::close() }}
		</div>	
	</div>
</div>

@stop