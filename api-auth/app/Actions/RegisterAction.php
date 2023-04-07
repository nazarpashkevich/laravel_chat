<?php

namespace App\Actions;

use App\Common\DTOs\UserData;
use App\Services\AuthService;
use F9Web\ApiResponseHelpers;
use Illuminate\Http\JsonResponse;

class RegisterAction
{
    use ApiResponseHelpers;

    public function __invoke(UserData $userData, AuthService $service): JsonResponse
    {
        if ($user = $service->register($userData)) {
            return $this->respondWithSuccess(['user' => UserData::from($user), 'token' => $user->makeWebToken()]);
        }

        return $this->respondError();
    }
}
