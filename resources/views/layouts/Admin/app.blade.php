<!DOCTYPE html>
<html lang="pt-BR">
	<head>

		<title>Administrativo - Site Direito de Ouvir Amplifon Brasil S/A</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="/admin/css/bootstrap.min.css" />
		<link rel="stylesheet" href="/admin/css/bootstrap-responsive.min.css" />
		<link rel="stylesheet" href="/admin/css/fullcalendar.css" />
		<link rel="stylesheet" href="/admin/css/uniform.css" />
		<link rel="stylesheet" href="/admin/css/select2.css" />
		<link rel="stylesheet" href="/admin/css/matrix-style.css" />
		<link rel="stylesheet" href="/admin/css/matrix-media.css" />
		<link rel="stylesheet" href="/admin/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="/admin/css/jquery.gritter.css" />
		<link rel="stylesheet" href="{{ url('/css/site-admin/app.css') }}">

		@yield('css-1')
		@yield('css-2')

		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

	</head>
	<body>

		@include('layouts.Admin._nav')

		<div id="content">

			<!--breadcrumbs-->
			  <div id="content-header">
			    <div id="breadcrumb">
					<a href="{{ url("/site-admin") }}" title="Go to Home" class="tip-bottom">
						<i class="icon-home"></i> Home
					</a>
					@foreach ($breadcrumbs as $breadcrumb)
						<a href="{{ $breadcrumb['url'] }}" class="tip-bottom" title="{{ $breadcrumb['name'] }}">
							<i class="{{ $breadcrumb['icon'] }}"></i> {{ $breadcrumb['name'] }}
						</a>
					@endforeach
				</div>

			    <h1>@yield('h1')</h1>
			  </div>
			<!--End-breadcrumbs-->

			@yield('content')
		</div>


		<div class="row-fluid">
	  		<div id="footer" class="span12">
	  			2017 {{ date('Y') == '2017' ? null : '- ' . date('Y') }} &copy; Direito de Ouvir Amplifon Brasil S/A | Design: Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> | Desenvolvido pelo: Departamento de T.I. da D.O.
	  		</div>
		</div>

		<script src="/admin/js/excanvas.min.js"></script>
		<script src="/admin/js/jquery.min.js"></script>
		<script src="/admin/js/jquery.ui.custom.js"></script>
		<script src="/admin/js/bootstrap.min.js"></script>
		<script src="/admin/js/jquery.flot.min.js"></script>
		<script src="/admin/js/jquery.flot.resize.min.js"></script>
		<script src="/admin/js/jquery.peity.min.js"></script>
		<script src="/admin/js/fullcalendar.min.js"></script>
		<script src="/admin/js/matrix.js"></script>
		<script src="/admin/js/matrix.dashboard.js"></script>
		<script src="/admin/js/jquery.gritter.min.js"></script>
		<script src="/admin/js/matrix.interface.js"></script>
		<script src="/admin/js/matrix.chat.js"></script>
		<script src="/admin/js/jquery.validate.js"></script>
		<script src="/admin/js/matrix.form_validation.js"></script>
		<script src="/admin/js/jquery.wizard.js"></script>
		<script src="/admin/js/jquery.uniform.js"></script>
		<script src="/admin/js/select2.min.js"></script>
		<script src="/admin/js/matrix.popover.js"></script>
		<script src="/admin/js/jquery.dataTables.min.js"></script>
		<script src="/admin/js/matrix.tables.js"></script>
		<script type="text/javascript" src="{{ url('/js/site-admin/app.js') }}"></script>

		@yield('js-1')
		@yield('js-2')
		@yield('js-3')

	</body>
</html>
