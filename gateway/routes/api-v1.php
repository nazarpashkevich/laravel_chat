<?php

use App\Actions\GatewayAction;
use App\Values\RouterMap;
use Illuminate\Support\Facades\Route;
use Laravel\Lumen\Routing\Router;

foreach (config('gateway.routes') as $route) {
    $routeMap = RouterMap::from($route);

    Route::group(['middlewares' => $routeMap->middlewares], function (Router $router) use ($routeMap) {
        $router->addRoute(
            ['GET','POST', 'PUT', 'PATCH', 'DELETE','OPTIONS'],
            $routeMap->prefix . '{url:.*}',
            ['uses' => '\App\Actions\GatewayAction@handle']
        );
    });
}
