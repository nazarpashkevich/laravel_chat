<?php

namespace App\Actions;

use App\Common\DTOs\UserData;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use F9Web\ApiResponseHelpers;
use Illuminate\Http\JsonResponse;

class LoginAction
{
    use ApiResponseHelpers;

    const ERROR_MESSAGE = 'Invalid credentials';

    public function __construct(private AuthService $service)
    {}

    public function __invoke(LoginRequest $request): JsonResponse
    {
        if ($user = $this->service->login($request->login(), $request->password())) {
            return $this->respondWithSuccess(['user' => UserData::from($user), 'token' => $user->makeWebToken()]);
        }

        return $this->respondError(self::ERROR_MESSAGE);
    }
}
