<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Default Connection Name
	|--------------------------------------------------------------------------
	*/

	'default' => 'main',

	/*
	|--------------------------------------------------------------------------
	| Algolia Connections
	|--------------------------------------------------------------------------
	*/

	'connections' => [

		'main' => [
			'id' => '0XJ54T0HH1',
			'search_key' => 'fd2fa8b7b2d60f6c607a72e62c11d96c',
			'key' => env('ALGOLIA_ADMIN_KEY', ''),
		],

	],

];
