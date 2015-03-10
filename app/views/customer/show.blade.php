@extends('master')


@section('content')

<div class="span well">
	<h4>Cliente {{ $user->id }}</h4>

	<p>Usuario: {{ $user->username }}</p>
	<p>Nombre: {{ $user->name }}</p>
	<p>Apellido: {{ $user->lastname }}</p>
	<p>Email: {{ $user->email }}</p>

	<p>{{ HTML::linkRoute('customer.edit', 'Editar', array($user->id), array('class' => 'btn btn-warning')) }}</p>
</div>


@stop