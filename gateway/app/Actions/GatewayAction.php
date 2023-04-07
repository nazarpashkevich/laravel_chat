<?php

namespace App\Actions;

use App\Services\GatewayService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GatewayAction
{
    public function handle(Request $request, GatewayService $service): Response
    {
        return $service->processRequest($request);
    }
}
