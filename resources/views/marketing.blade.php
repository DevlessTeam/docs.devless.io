@extends('app')

@section('body-class')
home
@endsection

@section('content')

<nav id="slide-menu" class="slide-menu" role="navigation">

	<div class="brand">
		<a href="/">
			<img src="https://devless.io/images/dv_logo_rev.png" height="50" alt="Laravel white logo">
		</a>
	</div>

	<ul class="slide-main-nav">
		@include('partials.main-nav')
	</ul>

</nav>
	<section class="panel ecosystem light" id="ecosystem">
		<h1>Getting Started with Devless</h1>
		<div class="container">
			<p>Devless is an open source backend as a service for mobile web and IOT application developers to rapidly develop their backend services and generate api endpoints with ease. You can check it out @ <a href="https://devless.io">Devless</a>.</p>
		</div>
		<!-- <div class="tiles">
			<div class="tile">
				<h2><a href="/docs/api">API</a></h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vehicula nec ligula id facilisis.</p>
			</div>
			<div class="tile">
				<h2><a href="/docs/apispecs">API Specs</a></h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vehicula nec ligula id facilisis.</p>
			</div>
			<div class="tile">
				<h2><a href="/docs/homestead">Console</a></h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vehicula nec ligula id facilisis.</p>
			</div>
			<div class="tile">
				<h2><a href="/docs/homestead">Philosophy</a></h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vehicula nec ligula id facilisis.</p>
			</div>
			<div class="tile">
				<h2><a href="#">SDK</a></h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vehicula nec ligula id facilisis.</p>
			</div>
			<div class="tile">
				<h2><a href="#">Tutorials</a></h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vehicula nec ligula id facilisis.</p>
			</div>
		</div> -->
	</section>
@endsection
