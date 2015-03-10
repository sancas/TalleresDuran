@extends('master')


@section('content')

<div class="span well">
	<h4>Lista clientes</h4>

	<table class="table table-striped">
		<tr>
			<th>Usuario</th>
			<th>Nombre</th>
			<th>Email</th>
		</tr>
		@foreach ($users as $user)
			@if($user->hasRole('customer'))
			<tr>
				<td>{{ $user->username }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
			</tr>
			@endif
		@endforeach
	</table>
</div>


@stop