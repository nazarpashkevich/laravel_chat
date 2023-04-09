<?php

namespace App\Common\Concerns;

trait HasCustomBuilder
{
    public function newEloquentBuilder($query)
    {
        return new $this->customEloquentBuilder($query);
    }
}
