@extends('master')

@section('content')


<div class="row">
	<div class="span offset1">
		<div class="well">
			@if (Auth::user()->username == 'customer')
				<legend>Carros en mantenimiento: 2</legend>
				<legend>Nissan Sentra</legend>
				<p>Placa: P684 731</p>
				<p>Tarjeta de circulacion: 9578463210</p>
				<p>{{ HTML::link('cars/1', 'Ver estado', array('class' => 'btn btn-info')) }}</p>
				<br/><br/>
				<legend>Toyota Corolla</legend>
				<p>Placa: P452 125</p>
				<p>Tarjeta de circulacion: 5648973210</p>
				<p>{{ HTML::link('cars/2', 'Ver estado', array('class' => 'btn btn-info')) }}</p>
			@endif
			@if (Auth::user()->username == 'KD')
				<legend>Carros en mantenimiento: 1</legend>
				<legend>Mitsubishi Lancer</legend>
				<p>Placa: P572 217</p>
				<p>Tarjeta de circulacion: 1234567890</p>
				<p>{{ HTML::link('cars/3', 'Ver estado', array('class' => 'btn btn-info')) }}</p>
			@endif
		</div>
	</div>
</div>

@stop