@extends('master')

@section('content')


<div class="row">
	<div class="span offset1">
		<div class="well">
			<legend>Cliente: {{ $customer->name }}</legend>
			<legend>Carros en mantenimiento: {{ $carros->count() }}</legend>
			@foreach ($carros as $carro)
				<legend>{{ $carro->marca }}</legend>
				<p>Placa: {{ $carro->placa }}</p>
				<p>Tarjeta de circulacion: {{ $carro->tarjetaCirculacion }}</p>
				<p>{{ HTML::link("mechanic/customers/" . $customer->id . "/car/" . $carro->id, 'Ver Trabajos', array('class' => 'btn btn-info')) }}</p>
			@endforeach
		</div>
	</div>
</div>

@stop