<?php

namespace App\Http\Middleware;

use App\Actions\CheckUserAuth;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Closure;

class Authenticate
{

    /**
     * Create a new middleware instance.
     *
     * @return void
     */
    public function __construct(private CheckUserAuth $checkUserAuth)
    {
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($this->checkUserAuth->handle($request->bearerToken())) {
            return $next($request);
        }

        return response('Unauthorized.', 401);
    }
}
