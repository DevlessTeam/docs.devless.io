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
				<p>The official Laravel local development environment. Powered by Vagrant, Homestead gets your entire team on the same page with the latest PHP, MySQL, Postgres, Redis, and more.</p>
			</div>
			<div class="tile">
				<h2><a href="/docs/apispecs">API Specs</a></h2>
				<p>The official Laravel local development environment. Powered by Vagrant, Homestead gets your entire team on the same page with the latest PHP, MySQL, Postgres, Redis, and more.</p>
			</div>
			<div class="tile">
				<h2><a href="/docs/homestead">Console</a></h2>
				<p>The official Laravel local development environment. Powered by Vagrant, Homestead gets your entire team on the same page with the latest PHP, MySQL, Postgres, Redis, and more.</p>
			</div>
			<div class="tile">
				<h2><a href="/docs/homestead">Philosophy</a></h2>
				<p>The official Laravel local development environment. Powered by Vagrant, Homestead gets your entire team on the same page with the latest PHP, MySQL, Postgres, Redis, and more.</p>
			</div>
			<div class="tile">
				<h2><a href="#">SDK</a></h2>
				<p>Hundreds (yes, hundreds) of Laravel and PHP video tutorials with new videos added every week! Skim the basics or start your journey to Laravel mastery. All for the price of lunch.</p>
			</div>
			<div class="tile">
				<h2><a href="#">Tutorials</a></h2>
				<p>Laravel is amazing out of the box, but there's more to explore! Let <a href="/docs/billing">Cashier</a> make subscription billing painless, or use <a href="https://github.com/laravel/socialite">Socialite</a> to authenticate with Facebook, Twitter, and more.</p>
			</div>
		</div>
	</section>
@endsection
