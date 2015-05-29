@extends('master')


@section('content')

<div class="row well">
	<h4>Lista clientes</h4>

	<table class="table table-striped">
		<tr>
			<th>ID Usuario</th>
			<th>Nombre</th>
			<th>Email</th>
			<th @if(Auth::user()->hasRole('owner')) colspan=3 @endif>Acciones</th>
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
				@if(Auth::user()->hasRole('owner'))
				<td>
					{{ HTML::linkRoute('customer.edit', 'Editar', array($user->id), array('class' => 'btn btn-warning')) }}
				</td>
				<td>
					{{ Form::model($user, array('route' => array('customer.destroy', $user->id), 'method' => 'DELETE', 'role' => 'form')) }}
						{{ Form::submit('Borrar', array('class' => 'btn btn-danger')) }}
					{{ Form::close() }}
				</td>
				@endif
			</tr>
			@endif
		@endforeach
	</table>
</div>


@stop