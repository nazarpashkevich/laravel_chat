<?php

namespace App\Repositories;

use App\Common\DTOs\UserData;
use App\Events\UserCreatedEvent;
use App\Models\User;
use App\Services\RedisService;

class UserRepository
{

    public function __construct(private RedisService $service)
    {}

    public function create(UserData $data): User
    {
        $user = User::create($data->registerData());

        $this->service->publishUserCreateEvent(new UserCreatedEvent($data));

        return $user;
    }
}
