@extends('master')

@section('content')

<div class="row well">
	{{ Form::open() }}
	{{ Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'Nombre')) }}<br />
	{{ Form::email('email', '', array('class' => 'form-control', 'placeholder' => 'Email')) }}<br />
	{{ Form::text('tema', '', array('class' => 'form-control', 'placeholder' => 'Tema')) }}
	{{ Form::textarea('mensaje', '', array('class' => 'form-control', 'placeholder' => 'Mensaje')) }}<br />
	{{ Form::submit('Enviar mensaje', array('class' => 'btn btn-success')) }}
	{{ Form::close() }}
</div>

@stop