@extends('master')

@section('content')


<div class="row">
	<div class="span offset1">
		<div class="well">
			<legend>Cliente: {{ $customer->name }}</legend>
			<legend>Carro: {{ $carro->marca }}</legend>
			@if ($trabajos->count() != 0)
				<legend>Trabajos realizados: {{ $trabajos->count() }}</legend>
				@foreach ($trabajos as $trabajo)
					<legend>{{ $trabajo->tipo }}</legend>
					<p>Descripcion: {{ $trabajo->descripcion }}</p>
					<p>Estado: {{ $trabajo->estado }}</p>
					<p>Costo: {{ $trabajo->costo }}</p>
				@endforeach
			@else
				<legend>Todavia no hay trabajos.</legend>
			@endif
			<p>
			@if (!($carro->listo || $carro->recogido))
			{{ HTML::link("mechanic/customers/" . $customer->id . "/car/" . $carro->id . "/addjob", 'Agregar Trabajo', array('class' => 'btn btn-info')) }}
			@endif
			{{ HTML::link("mechanic/customers/" . $customer->id , 'Regresar', array('class' => 'btn btn-danger')) }}
			</p>
		</div>
	</div>
</div>

@stop