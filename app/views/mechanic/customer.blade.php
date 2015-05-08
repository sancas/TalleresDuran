@extends('master')


@section('content')

<div class="row well">
	<h4>Lista clientes</h4>

	<table class="table table-striped">
		<tr>
			<th>ID Usuario</th>
			<th>Nombre</th>
			<th>Email</th>
			<th>Acciones</th>
		</tr>
		@foreach ($users as $user)
			@if($user->hasRole('customer'))
			<tr>
				<td>{{ $user->id }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>
					{{ HTML::link("mechanic/customers/" . $user->id, 'Ver carros', array('class' => 'btn btn-info')) }}
				</td>
			</tr>
			@endif
		@endforeach
	</table>
</div>


@stop