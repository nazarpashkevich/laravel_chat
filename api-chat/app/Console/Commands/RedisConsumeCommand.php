<?php

namespace App\Console\Commands;

use App\Actions\CreateUserAction;
use App\DTOs\UserData;
use App\Services\RedisService;
use Illuminate\Console\Command;

class RedisConsumeCommand extends Command
{
    /*
     * @todo rewrite all
     */
    protected $signature = 'redis:consume';
    protected $description = 'Consume events from Redis stream';

    public function handle(RedisService $redis, CreateUserAction $createUserAction)
    {
        foreach ($redis->getUnprocessedEvents() as $event) {
            match ($event['type']) {
                Events::USER_CREATED => $createUserAction(UserData::from($event['data'])),
                default => null
            };

            $redis->addProcessedEvent($event);
        }
    }
}
