<?php

$api = app('Dingo\Api\Routing\Router');
$baseControllersPath = 'App\Api\V1\Controllers\\';

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$api->version('v1', function ($api) use ($baseControllersPath) {
    $api->any('test', $baseControllersPath . 'TestController@test');

    $api->post('register', $baseControllersPath . 'UserController@createUser');

    $api->post('login', $baseControllersPath . 'UserController@loginUser');
});

$api->version('v1', ['middleware' => ['api.auth']], function ($api) use ($baseControllersPath) {
    $api->post('logout', $baseControllersPath . 'UserController@logoutUser');

    $api->post('fetchMovie', $baseControllersPath . 'MovieController@getMovieDetails');

    $api->post('bookmark', $baseControllersPath . 'BookmarksController@create');
``
    $api->get('bookmarks', $baseControllersPath . 'BookmarksController@index');
});
