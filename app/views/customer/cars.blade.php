@extends('master')

@section('content')


<div class="row">
	<div class="span offset1">
		<div class="well">
			<legend>Carros en mantenimiento: {{ $carros->count() }}</legend>
			@foreach ($carros as $carro)
				<legend>{{ $carro->marca }} {{ HTML::link("customer/cars/" . $carro->id, 'Ver estado', array('class' => 'btn btn-info')) }}</legend>
				<p>Placa: {{ $carro->placa }}</p>
				<p>Tarjeta de circulacion: {{ $carro->tarjetaCirculacion }}</p>
				<p>Estado:
					@if ($carro->recogido)
					El carro ya fue entregado
					<div class="progress">
					  <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: 100%">
					    100% Complete
					  </div>
					</div>
					@else
						@if ($carro->listo)
						El carro ya esta listo y puede pasar a recogerlo
						<div class="progress">
						  <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: 100%">
						    100% Complete
						  </div>
						</div>
						@else
						El carro aun se encuentra en mantenimiento
						@endif
					@endif
				</p>
			@endforeach
		</div>
	</div>
</div>

@stop