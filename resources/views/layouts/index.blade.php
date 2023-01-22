<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	{{-- Stylesheets --}}
	@section('styles')
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
		@vite('resources/css/app.css')
	@show

	<meta name="viewport" content="width=device-width, initial-scale=1" />

	{{-- Document Title --}}
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Dev Project | MSTECS</title>

</head>

	<body class="stretched side-header">

		{{-- Document Wrapper --}}
		<div id="wrapper" class="clearfix">

			{{-- Header --}}
			@yield('navbar')
			{{-- #header end --}}

			{{-- Content --}}
			<section id="content">
				<div class="content-wrap py-0">
                    @yield('page-title')
					@yield('content')
				</div>
			</section>
			{{-- Content end --}}

			{{-- Footer --}}
			@include('layouts.footer')
			{{-- #footer end --}}

		</div>
		{{-- #wrapper end --}}

		@section('scripts')
			{{-- JavaScripts --}}
			<script src="{{asset('layout/js/jquery.js')}}"></script>
			<script src="{{asset('layout/js/plugins.min.js')}}"></script>

			{{-- Footer Scripts --}}
			<script src="{{asset('layout/js/functions.js')}}"></script>
		@show

	</body>
</html>