<?php

namespace App\Services;

use App\DTOs\UserData;

class RedisService extends BaseRedisService
{
    public function getServiceName(): string
    {
        return 'products';
    }

    public function publishUserCreateEvent(UserData $data): void
    {
        $this->publish($data);
    }
}
