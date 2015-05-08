@extends('master')


@section('content')

<div class="row well">
	<h4>Cliente {{ $user->id }}</h4>

	<p>Usuario: {{ $user->username }}</p>
	<p>Nombre: {{ $user->name }}</p>
	<p>Apellido: {{ $user->lastname }}</p>
	<p>Email: {{ $user->email }}</p>

	@if(Auth::User()->hasRole('owner'))
	<p>{{ HTML::linkRoute('customer.edit', 'Editar', array($user->id), array('class' => 'btn btn-warning')) }}</p>
	@else
	<p>{{ HTML::link('mechanic/customers', 'Regresar', array('class' => 'btn btn-warning')) }}
	@endif
</div>


@stop