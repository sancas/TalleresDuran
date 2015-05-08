<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	{{ HTML::script('js/jquery.js') }}
	{{ HTML::script('js/bootstrap.js') }}
	{{ HTML::style('css/bootstrap.css') }}

</head>
<body>
<div class="row-fluid">
	<div class="span12 well">
		<h1>Talleres Duran</h1>
	</div>
	<nav class="navbar navbar-default col-md-6 col-md-offset-3">
		<div class="container-fluid">
			@if (Auth::user())
				<div class="navbar-header">
			      <a class="navbar-brand" href="#">{{ ucwords(Auth::user()->username) }}</a>
			    </div>
			@endif
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		      	@if (Auth::user())
			      	@if (Auth::user()->hasRole('owner'))
			      		<li class="navbar-left">{{ HTML::link('owner', 'Home') }}</li>
						<li>{{ HTML::link('owner/mechanic', 'Mecanicos') }}</li>
						<li>{{ HTML::link('owner/customer', 'Clientes') }}</li>
					@endif
					@if (Auth::user()->hasRole('mechanic'))
						<li class="navbar-left">{{ HTML::link('mechanic', 'Home') }}</li>
						<li>{{ HTML::link('mechanic/customers', 'Clientes') }}</li>
					@endif
					@if (Auth::user()->hasRole('customer'))
						<li class="navbar-left">{{ HTML::link('customer', 'Home') }}</li>
						<li>{{ HTML::link('customer/cars', 'Carros') }}</li>
					@endif
					<li class="navbar-right">{{ HTML::link('logout', 'Logout') }}</li>
				@else
					<li class="navbar-left">{{ HTML::link('', 'Home') }}</li>
					<li class="navbar-right">{{ HTML::link('login', 'Login') }}</li>
				@endif
				<li>{{ HTML::link('contact', 'Contactenos') }}</li>
		      </ul>
		    </div>
		</div>
	</nav>
</div>
	<div class="container-fluid row">
		<div class="col-md-6 col-md-offset-3 text-center">
			@yield('content')
		</div>
	</div>
</body>
</html>