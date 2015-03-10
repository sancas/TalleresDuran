@extends('master')


@section('content')

<div class="span well">
	<h4>Lista mecanicos</h4>

	<table class="table table-striped">
		<tr>
			<th>Usuario</th>
			<th>Nombre</th>
			<th>Email</th>
			<th>Acciones</th>
		</tr>
		@foreach ($users as $user)
			@if($user->hasRole('customer'))
			<tr>
				<td>{{ $user->username }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>
					{{ HTML::linkRoute('customer.show', 'Ver', array($user->id), array('class' => 'btn btn-info')) }}
					{{ HTML::linkRoute('customer.edit', 'Editar', array($user->id), array('class' => 'btn btn-warning')) }}
					{{ HTML::linkRoute('customer.destroy', 'Borrar', array($user->id), array('class' => 'btn btn-danger')) }}
				</td>
			</tr>
			@endif
		@endforeach
	</table>
	{{ HTML::linkRoute('customer.create', 'Crear', array(), array('class' => 'btn btn-primary')) }}
</div>


@stop