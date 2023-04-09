<?php

use App\Http\Controllers\UserController;
use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// auth routes
Route::group([
    'middleware' => [],
    'prefix' => '/auth/',
], function (Registrar $route) {
    $route->post('login', \App\Actions\LoginAction::class);
    $route->post('register', \App\Actions\RegisterAction::class);
});

// user routes
Route::group([
    'middleware' => ['auth:sanctum'],
    'controller' => UserController::class,
    'prefix' => '/user/',
], function (Registrar $route) {
    $route->get('me', 'show');
    $route->get('search', 'search');
});
