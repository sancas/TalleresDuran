@extends('master')


@section('content')

<div class="span well">
	<h4>Lista clientes</h4>

	<table class="table table-striped">
		<tr>
			<th>ID Usuario</th>
			<th>Nombre</th>
			<th colspan="1">Acciones</th>
		</tr>
		@foreach ($users as $user)
			@if($user->hasRole('customer'))
			<tr>
				<td>{{ $user->id }}</td>
				<td>{{ $user->name }}</td>
				<td>
					{{ HTML::linkRoute('customer.show', 'Ver', array($user->id), array('class' => 'btn btn-info')) }}
				</td>
			</tr>
			@endif
		@endforeach
	</table>
</div>


@stop