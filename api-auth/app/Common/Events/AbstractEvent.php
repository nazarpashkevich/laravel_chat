<?php

namespace App\Events;

use Illuminate\Contracts\Support\Jsonable;

abstract class AbstractEvent implements Jsonable
{
    public function toJson($options = 0): string
    {
        return json_encode($this);
    }
}
