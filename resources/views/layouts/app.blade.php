<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>@yield('title')</title>
	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
	<!-- Iconos -->
	<link rel="stylesheet" href="{{ asset('css/icon.css') }}">
	<!-- Data tables -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/dataTables/css/dataTables.bootstrap.css') }}">
	<!-- Otros estilos -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/estilos.css') }}">
	
    
	@yield('css')
</head>
<body>
	@include('layouts.elements.navbar')
	<div class="container background">
			<div class="row row-fluid">
				<div class="col-md-10 col-sm-offset-1">
					@include('flash::message')
					@if(count($errors) > 0)
						<div class="alert alert-danger" role="alert">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
				</div>
			</div>
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					@yield('content')	
				</div>
			</div>
	</div>
		@include('layouts.elements.footer')	
	<!--Jquery -->
	<script src="{{ asset('plugins/jquery/jquery-2.1.4.js') }}"></script>
	<!--bootstrap -->
	<script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
	<!--Data tables -->
		<script type="text/javascript" src="{{ asset('plugins/dataTables/js/jquery.dataTables.js') }}"></script>
		<script type="text/javascript" src="{{ asset('plugins/dataTables/js/dataTables.bootstrap.js') }}"></script>
	@yield('scripts')
</body>
</html>