<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class GatewayService
{
    public function processRequest(Request $request): Response
    {
        $client = new Client();
        try {
            $response = $client->request($request->getMethod(), $this->resolveUrl($request), $request->toArray());

            return new Response($response->body(), $response->status());
        } catch (RequestException $exception) {
            dd($exception);
            $response = $exception->getResponse();

            return new Response($response->getBody(), $exception->getCode());
        }
    }

    public function resolveUrl(Request $request): string
    {
        return $this->resolveHost($request) . $request->route('url');
    }

    public function resolveHost(Request $request): string
    {
        return last(explode('/', Str::replace($request->route('url'), '', $request->getPathInfo())));
    }
}
