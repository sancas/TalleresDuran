@extends('master')

@section('content')


<div class="row">
	<div class="span offset1">
		<div class="well">
			<legend>Cliente: {{ $customer->name }}</legend>
			@if ($carros->count() != 0)
				<legend>Carros en mantenimiento: {{ $carros->count() }}</legend>
				@foreach ($carros as $carro)
					<legend>{{ $carro->marca }} {{ HTML::link("mechanic/customers/" . $customer->id . "/car/" . $carro->id, 'Ver Trabajos', array('class' => 'btn btn-success')) }} 
					@if (!$carro->listo)
						{{ HTML::link("mechanic/customers/" . $customer->id . "/car/" . $carro->id . "/listo", 'Marcar como listo', array('class' => 'btn btn-warning')) }}
					@endif
					@if (!$carro->recogido && $carro->listo)
						{{ HTML::link("mechanic/customers/" . $customer->id . "/car/" . $carro->id . "/recogido", 'Marcar como recogido', array('class' => 'btn btn-warning')) }}
					@endif

					</legend>
					<p>Placa: {{ $carro->placa }}</p>
					<p>Tarjeta de circulacion: {{ $carro->tarjetaCirculacion }}</p>
					<p>Estado:
						@if ($carro->recogido)
						El carro ya fue entregado
						@else
							@if ($carro->listo)
							El carro ya esta listo y puede pasar a recogerlo
							@else
							El carro aun se encuentra en mantenimiento
							@endif
						@endif
					</p>
				@endforeach
			@else
				<legend>El cliente todavia no posee carros registrados.</legend>
			@endif
			<p>{{ HTML::link("mechanic/customers/" . $customer->id . "/addcar", 'Agregar carro', array('class' => 'btn btn-info')) }}
			{{ HTML::link("mechanic/customers/", 'Regresar', array('class' => 'btn btn-danger')) }}
			</p>
		</div>
	</div>
</div>

@stop