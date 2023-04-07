<?php

namespace App\Actions;

use Illuminate\Support\Facades\Http;

class CheckUserAuth
{
    public function handle(?string $bearer): bool
    {
        if ($bearer) {
            // make request to auth service
            $response = Http::withToken($bearer)
                            ->get(config('gateway.auth_host') . config('gateway.auth_check_route'));

            return $response->ok();
        }

        return false;
    }
}
