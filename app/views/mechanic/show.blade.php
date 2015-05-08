@extends('master')


@section('content')

<div class="row well">
	<h4>Mecanico {{ $user->id }}</h4>

	<p>Usuario: {{ $user->username }}</p>
	<p>Nombre: {{ $user->name }}</p>
	<p>Apellido: {{ $user->lastname }}</p>
	<p>Email: {{ $user->email }}</p>

	<p>{{ HTML::linkRoute('mechanic.edit', 'Editar', array($user->id), array('class' => 'btn btn-warning')) }}</p>
</div>


@stop