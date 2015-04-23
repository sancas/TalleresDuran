@extends('master')


@section('content')

<div class="span well">
	@if ($carro_id == 1)
	<h4>Nissan Sentra</h4>
	<legend>Trabajos totales: 3</legend>
	<legend>Enderezado</legend>
		<p>Descripcion: Se pidio enderezar la capota del carro debido al choque</p>
		<p>Estado: 100% terminado</p>
		<p>Costo: $400</p>
	<br /><br />
	<legend>Pintura</legend>
		<p>Descripcion: Se pintara la capota del mismo color que el carro, azul negro</p>
		<p>Estado: 68% completado</p>
		<p>Costo: $299</p>
	<br /><br />
	<legend>Limpieza de motor</legend>
		<p>Descripcion: Limpieza interna del motor</p>
		<p>Estado: 0% esperando trabajo de pintura</p>
		<p>Costo: $89.99</p>
	<br /><br />
	<p>Costo Total: $788.99 IVA incluido</p>
	<p>Fecha aproximada de entrega: 13/04/2015</p>
	<br /><br />
	@elseif ($carro_id == 2)
	<h4>Toyota Corolla</h4>
	<legend>Trabajos totales: 2</legend>
	<legend>Enderezado</legend>
		<p>Descripcion: Se pidio enderezar las puertas laterales izquierdas del carro</p>
		<p>Estado: 24% terminado</p>
		<p>Costo: $800</p>
	<br /><br />
	<legend>Pintura</legend>
		<p>Descripcion: Se pintara el area afectada del mismo color que el carro, rojo</p>
		<p>Estado: 0% esperando trabajo de enderezamiento</p>
		<p>Costo: $499</p>
	<br /><br />
	<p>Costo Total: $1299 IVA incluido</p>
	<p>Fecha aproximada de entrega: 28/04/2015</p>
	<br /><br />
	@elseif ($carro_id == 3)
	<h4>Mitsubishi Lancer</h4>
	<legend>Trabajos totales: 1</legend>
	<legend>Pintura</legend>
		<p>Descripcion: Se pintara el carro completo de rosa</p>
		<p>Estado: 85% </p>
		<p>Costo: $499</p>
	<br /><br />
	<p>Costo Total: $499 IVA incluido</p>
	<p>Fecha aproximada de entrega: 18/04/2015</p>
	<br /><br />
	@endif
	<p>{{ HTML::link('customer/cars', 'Regresar', array('class' => 'btn btn-warning')) }}</p>
</div>


@stop