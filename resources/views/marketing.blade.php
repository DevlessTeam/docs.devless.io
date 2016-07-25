@extends('app')

@section('body-class')
home
@endsection

@section('content')

<nav id="slide-menu" class="slide-menu" role="navigation">

	<div class="brand">
		<a href="/">
			<img src="/assets/img/laravel-logo-white.png" height="50" alt="Laravel white logo">
		</a>
	</div>

	<ul class="slide-main-nav">
		@include('partials.main-nav')
	</ul>

</nav>
	<section class="panel ecosystem light" id="ecosystem">
		<h1>Learn to Build your Awesome Backend</h1>
		<!-- <p>Revolutionize how you build the web.</p> -->
		<div class="tiles">
			<div class="tile">
				<h2><a href="/docs/api">API</a></h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vehicula nec ligula id facilisis. Nulla pretium laoreet sapien.</p>
			</div>
			<div class="tile">
				<h2><a href="/docs/apispecs">API Specs</a></h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vehicula nec ligula id facilisis. Nulla pretium laoreet sapien.</p>
			</div>
			<div class="tile">
				<h2><a href="/docs/homestead">Console</a></h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vehicula nec ligula id facilisis. Nulla pretium laoreet sapien.</p>
			</div>
			<div class="tile">
				<h2><a href="/docs/homestead">Philosophy</a></h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vehicula nec ligula id facilisis. Nulla pretium laoreet sapien.</p>
			</div>
			<div class="tile">
				<h2><a href="#">SDK</a></h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vehicula nec ligula id facilisis. Nulla pretium laoreet sapien.</p>
			</div>
			<div class="tile">
				<h2><a href="#">Tutorials</a></h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vehicula nec ligula id facilisis. Nulla pretium laoreet sapien.</p>
			</div>
		</div>
	</section>
@endsection
