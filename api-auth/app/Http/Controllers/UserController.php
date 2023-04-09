<?php

namespace App\Http\Controllers;

use App\Common\DTOs\UserData;
use App\Services\UserService;
use F9Web\ApiResponseHelpers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ApiResponseHelpers;

    public function show(Request $request): JsonResponse
    {
        return $this->respondWithSuccess(UserData::from($request->user()));
    }

    public function search(Request $request, UserService $service): JsonResponse
    {
        return $this->respondWithSuccess(
            UserData::collection($service->search($request->string('query', ''), $request->all()))
        );
    }
}
