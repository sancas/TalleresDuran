@extends('master')


@section('content')

<div class="span well">
	<h4>Lista Trabajos</h4>

		<table class="table table-striped">
		<tr>
			<th>Tipo</th>
			<th>Estado</th>
			<th>Costo</th>
			<th colspan="2">Acciones</th>
		</tr>
		@foreach ($trabajos as $trabajo)
			<tr>
				<td>{{ $trabajo->tipo }}</td>
				<td>{{ $trabajo->estado }}</td>
				<td>{{ $trabajo->costo }}</td>
				<td>
					{{ HTML::linkRoute('trabajo.show', 'Ver', array($trabajo->id), array('class' => 'btn btn-info')) }}
				</td>
				<td>
					{{ HTML::linkRoute('trabajo.edit', 'Editar', array($trabajo->id), array('class' => 'btn btn-warning')) }}
				</td>
				<!--<td>
					{{ Form::model($trabajo, array('route' => array('trabajo.destroy', $trabajo->id), 'method' => 'DELETE', 'role' => 'form')) }}
						{{ Form::submit('Borrar', array('class' => 'btn btn-danger')) }}
					{{ Form::close() }}
				</td>!-->
			</tr>
		@endforeach
	</table>
	{{ HTML::linkRoute('trabajo.create', 'Crear', array(), array('class' => 'btn btn-primary')) }}
</div>


@stop