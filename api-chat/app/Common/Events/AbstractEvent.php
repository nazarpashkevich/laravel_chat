<?php

namespace App\Common\Events;

abstract class AbstractEvent
{
    public function toJson(): string
    {
        return json_encode($this);
    }
}
