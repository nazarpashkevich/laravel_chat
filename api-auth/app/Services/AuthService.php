<?php

namespace App\Services;

use App\Common\DTOs\UserData;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class AuthService
{

    public function __construct(private UserRepository $repository)
    {
    }

    public function login(string $login, string $password): ?Authenticatable
    {
        if (Auth::attempt(['email' => $login, 'password' => $password])) {
            return Auth::getUser();
        }

        return null;
    }

    public function register(UserData $data): ?Authenticatable
    {
        if ($user = $this->repository->create($data)) {
            Auth::login($user);

            return $user;
        }

        return null;
    }
}
