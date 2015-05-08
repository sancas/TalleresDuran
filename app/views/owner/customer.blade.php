@extends('master')


@section('content')

<div class="row well">
	<h4>Lista clientes</h4>

	<table class="table table-striped">
		<tr>
			<th>Usuario</th>
			<th>Nombre</th>
			<th>Email</th>
			<th colspan="3">Acciones</th>
		</tr>
		@foreach ($users as $user)
			@if($user->hasRole('customer'))
			<tr>
				<td>{{ $user->username }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>
					{{ HTML::linkRoute('customer.show', 'Ver', array($user->id), array('class' => 'btn btn-info')) }}
				</td>
				<td>
					{{ HTML::linkRoute('customer.edit', 'Editar', array($user->id), array('class' => 'btn btn-warning')) }}
				</td>
				<td>
					{{ Form::model($user, array('route' => array('customer.destroy', $user->id), 'method' => 'DELETE', 'role' => 'form')) }}
						{{ Form::submit('Borrar', array('class' => 'btn btn-danger')) }}
					{{ Form::close() }}
				</td>
			</tr>
			@endif
		@endforeach
	</table>
	{{ HTML::linkRoute('customer.create', 'Crear', array(), array('class' => 'btn btn-primary')) }}
</div>


@stop