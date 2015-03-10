@extends('master')


@section('content')

<div class="span well">
	<h4>Bienvenido {{ ucwords(Auth::user()->username) }}</h4>
	<h3>Usted es un mecanico</h3>
</div>


@stop