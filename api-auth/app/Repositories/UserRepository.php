<?php

namespace App\Repositories;

use App\DTOs\UserData;
use App\Models\User;
use Illuminate\Support\Facades\Redis;

class UserRepository
{

    public function create(UserData $data): User
    {
        $user = User::create($data->registerData());
        // @todo send redis event

        return $user;
    }
}
