@extends('master')


@section('content')

<div class="row well">
	<h4>Carro {{ $carro->id }}</h4>

	<p>ID Usuario: {{ $carro->user_id }}</p>
	<p>Marca: {{ $carro->marca }}</p>
	<p>Placa: {{ $carro->placa }}</p>
	<p>Tarjeta de Circulacion: {{ $carro->tarjetaCirculacion }}</p>

	<p>{{ HTML::linkRoute('carro.edit', 'Editar', array($carro->id), array('class' => 'btn btn-warning')) }}</p>
</div>


@stop