@extends('master')


@section('content')

<div class="span well">
	<h4>Lista carros</h4>

		<table class="table table-striped">
		<tr>
			<th>Marca</th>
			<th>Placa</th>
			<th>Tarjeta Circulacion</th>
			<th colspan="3">Acciones</th>
		</tr>
		@foreach ($carros as $carro)
			<tr>
				<td>{{ $carro->marca }}</td>
				<td>{{ $carro->placa }}</td>
				<td>{{ $carro->tarjetaCirculacion }}</td>
				<td>
					{{ HTML::linkRoute('carro.show', 'Ver', array($carro->id), array('class' => 'btn btn-info')) }}
				</td>
				<td>
					{{ HTML::linkRoute('carro.edit', 'Editar', array($carro->id), array('class' => 'btn btn-warning')) }}
				</td>
				<td>
					{{ Form::model($carro, array('route' => array('carro.destroy', $carro->id), 'method' => 'DELETE', 'role' => 'form')) }}
						{{ Form::submit('Borrar', array('class' => 'btn btn-danger')) }}
					{{ Form::close() }}
				</td>
			</tr>
		@endforeach
	</table>
	{{ HTML::linkRoute('carro.create', 'Crear', array(), array('class' => 'btn btn-primary')) }}
</div>


@stop