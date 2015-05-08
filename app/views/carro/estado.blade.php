@extends('master')

@section('content')


<div class="row">
	<div class="span offset1">
		<div class="well">	
			<legend>Carro: {{ $carro->marca }}</legend>
			@if ($trabajos->count() != 0)
				<legend>Trabajos realizados: {{ $trabajos->count() }}</legend>
				@foreach ($trabajos as $trabajo)
					<legend>{{ $trabajo->tipo }}</legend>
					<p>Descripcion: {{ $trabajo->descripcion }}</p>
					<p>Estado: </p>
					<div class="progress">
					  <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="{{ $trabajo->estado }}" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: {{ $trabajo->estado }}%">
					    {{ $trabajo->estado }}% Complete
					  </div>
					</div>
					<p>Costo: {{ $trabajo->costo }}</p>
				@endforeach
			@else
				<legend>Todavia no hay trabajos.</legend>
			@endif
			<p>{{ HTML::link('customer/cars', 'Regresar', array('class' => 'btn btn-danger')) }}</p>
		</div>
	</div>
</div>

@stop