<?php

namespace App\Values;

class RouterMap
{
    public function __construct(public string $prefix, public array $middlewares)
    {
    }

    public static function from(array $router): self
    {
        return new self($router['prefix'], $router['middlewares'] ?? []);
    }
}
