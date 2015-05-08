@extends('master')

@section('content')


<div class="row">
	<div class="span offset1">
		<div class="well">
			<legend>{{ $carro->marca }} de {{ $customer->name }}</legend>
			@if ($trabajos->count() != 0)
				<legend>Trabajos realizados: {{ $trabajos->count() }}</legend>
				<table class="table table-striped">
					<tr>
						<th>Tipo</th>
						<th>Descripcion</th>
						<th>Estado</th>
						<th>Costo</th>
						<th colspan="3">Acciones</th>
					</tr>
					@foreach ($trabajos as $trabajo)
						<tr>
							<td>{{ $trabajo->tipo }}</td>
							<td>{{ $trabajo->descripcion }}</td>
							<td>{{ $trabajo->estado }}</td>
							<td>{{ $trabajo->costo }}</td>
							<td>
								{{ HTML::linkRoute('trabajo.show', 'Ver', array($trabajo->id), array('class' => 'btn btn-info')) }}
							</td>
							<td>
								{{ HTML::linkRoute('trabajo.edit', 'Editar', array($trabajo->id), array('class' => 'btn btn-warning')) }}
							</td>
							<td>
								{{ Form::model($trabajo, array('route' => array('trabajo.destroy', $trabajo->id), 'method' => 'DELETE', 'role' => 'form')) }}
									{{ Form::submit('Borrar', array('class' => 'btn btn-danger')) }}
								{{ Form::close() }}
							</td>
						</tr>
					@endforeach
				</table>
			@else
				<legend>Todavia no hay trabajos.</legend>
			@endif
			@if (!($carro->listo || $carro->recogido))
			{{ HTML::link("mechanic/customers/" . $customer->id . "/car/" . $carro->id . "/addjob", 'Agregar Trabajo', array('class' => 'btn btn-info')) }}
			@endif
			{{ HTML::link("mechanic/customers/" . $customer->id , 'Regresar', array('class' => 'btn btn-danger')) }}
		</div>
	</div>
</div>

@stop