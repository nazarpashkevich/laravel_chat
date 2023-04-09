<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class UserService
{
    public function __construct()
    {
    }

    public function search(string $query, array $params = []): Collection|LengthAwarePaginator
    {
        $builder = User::query()
                       ->where('name', 'like', "%{$query}%");

        return $builder->getWithResolveRequestParams($params);
    }
}
