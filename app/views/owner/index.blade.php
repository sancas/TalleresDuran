@extends('master')


@section('content')

<div class="span8 well">
	<h4>Bienvenido {{ ucwords(Auth::user()->username) }}</h4>
	<h3>Usted es un owner</h3>
</div>


@stop