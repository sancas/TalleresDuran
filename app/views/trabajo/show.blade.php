@extends('master')


@section('content')

<div class="span well">
	<h4>Trabajo {{ $trabajo->id }}</h4>

	<p>Tipo: {{ $trabajo->tipo }}</p>
	<p>Descripcion: {{ $trabajo->descripcion }}</p>
	<p>Estado: {{ $trabajo->estado }}</p>
	<p>Costo: {{ $trabajo->costo }}</p>

	<p>{{ HTML::linkRoute('trabajo.edit', 'Editar', array($trabajo->id), array('class' => 'btn btn-warning')) }}</p>
</div>


@stop