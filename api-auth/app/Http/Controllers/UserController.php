<?php

namespace App\Http\Controllers;

use App\Common\DTOs\UserData;
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
}
