<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * Set the default documentation version...
 */
define('DEFAULT_VERSION', '1.0');

/**
 * Convert some text to Markdown...
 */
function markdown($text) {
	return (new ParsedownExtra)->text($text);
}

get('/', 'DocsController@showRootPage');

get('docs', 'DocsController@showRootPage');
get('docs/{version}/{page?}', 'DocsController@show');
