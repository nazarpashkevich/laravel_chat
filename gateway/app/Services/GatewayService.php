<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class GatewayService
{
    const ALLOWED_HEADERS = ['accept', 'content-type', 'authorization'];

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function processRequest(Request $request): Response
    {
        $client = new Client([
            'timeout' => 60.0,
            'http_errors' => false, // disable guzzle exception on 4xx or 5xx response code
        ]);

        $resp = $client->request($request->method(), $this->resolveUrl($request), [
            'headers' => $this->filterHeaders($request->header()),
            'query'   => $request->query(),
            'body'    => $request->getContent(),
        ]);

        return (new Response($resp->getBody()->getContents(), $resp->getStatusCode()))
            ->withHeaders($this->filterHeaders($resp->getHeaders()));
    }

    public function filterHeaders(array $headers): array
    {
        return array_filter(
            $headers,
            fn ($key) => in_array(strtolower($key), self::ALLOWED_HEADERS),
            ARRAY_FILTER_USE_KEY
        );
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
