<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

Route::group([
    'prefix' => 'auth'
], function ($router) {
    $router->post('login', 'AuthController@login');
    $router->post('logout', 'AuthController@logout');
    $router->post('refresh', 'AuthController@refresh');
    $router->post('me', 'AuthController@me');
});

Route::group([
    'prefix' => 'api',
], function ($router) {
    $router->group([
        'prefix' => 'technologies',
    ], function ($router) {
        $router->get('/', 'TechnologyController@index');
        $router->get('/{id}', 'TechnologyController@show');
        $router->post('/', 'TechnologyController@create');
        $router->put('/{id}', 'TechnologyController@update');
        $router->delete('/{id}', 'TechnologyController@delete');
    });
    $router->group([
        'prefix' => 'types',
    ], function ($router) {
        $router->get('/', 'TypeController@index');
    });
    $router->group([
        'prefix' => 'states',
    ], function ($router) {
        $router->get('/', 'StateController@index');
    });
});

$router->get('/', function () use ($router) {
    return $router->app->version();
});
