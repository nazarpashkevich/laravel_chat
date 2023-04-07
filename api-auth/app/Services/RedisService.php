<?php

namespace App\Services;

use App\Events\UserCreatedEvent;

class RedisService extends BaseRedisService
{
    public function getServiceName(): string
    {
        return 'products';
    }

    public function publishUserCreateEvent(UserCreatedEvent $event): void
    {
        $this->publish($event);
    }
}
