<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>{{ isset($title) ? $title . ' - ' : null }}Devless - Documentation</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="author" content="Taylor Otwell">
	<meta name="description" content="Laravel - The PHP framework for web artisans.">
	<meta name="keywords" content="laravel, php, framework, web, artisans, taylor otwell">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--[if lte IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="{{ elixir('assets/css/laravel.css') }}">
	<link rel="stylesheet" href="/assets/css/custom.css">
	<!-- <link rel="apple-touch-icon" href="/favicon.png"> -->
	<link rel="icon" type="image/png" href="https://devless.io/logo.png" >
</head>
<body class="@yield('body-class', 'docs') language-php">

	<span class="overlay"></span>

	<nav class="main">
		<div class="container">
			<a href="/" class="brand">
				<img src="https://devless.io/images/dv_logo.jpg" height="60">
			</a>

			<div class="responsive-sidebar-nav">
				<a href="#" class="toggle-slide menu-link btn">&#9776;</a>
			</div>

			@if (Request::is('docs*') && isset($currentVersion))
				@include('partials.switcher')
			@endif

			<ul class="main-nav">
				@include('partials.main-nav')
			</ul>
		</div>
	</nav>

	<div class="title-area">
		<div class="container">
			<h2 class="title medium mr-b-10">Devless Knowledgebase</h2>
			<p class="title-sub medium">Documentation for your awesome application.</p>
		</div>
	</div>

	@yield('content')

	<footer class="main">
		<a href="#">
			<img src="https://devless.io/images/dv_logo_rev2.png" class="dv-logo">
		</a>
	</footer>

	@if (Request::is('docs*') && isset($currentVersion))
	<script>
		var algolia_app_id      = '<?php echo Config::get('algolia.connections.main.id', false); ?>';
		var algolia_search_key  = '<?php echo Config::get('algolia.connections.main.search_key', false); ?>';
		var version             = '<?php echo $currentVersion; ?>';
	</script>

		@include('partials.algolia_template')
	@endif

	<script src="{{ elixir('assets/js/laravel.js') }}"></script>
	<script src="/assets/js/viewport-units-buggyfill.js"></script>
	<script>window.viewportUnitsBuggyfill.init();</script>
	<script>
		var _gaq=[['_setAccount','UA-23865777-1'],['_trackPageview']];
		(function(d,t){
			var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)
		}(document,'script'));
	</script>
</body>
</html>
