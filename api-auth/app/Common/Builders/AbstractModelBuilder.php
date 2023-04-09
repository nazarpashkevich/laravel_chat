<?php

namespace App\Common\Builders;

use App\Common\Values\Request\RequestBaseParams;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

abstract class AbstractModelBuilder extends Builder
{
    public function getWithResolveRequestParams(array $params): Collection|LengthAwarePaginator
    {
        $requestParams = RequestBaseParams::from($params);
        $this->resolvePagination($requestParams);

        return $this->resolvePagination($requestParams);
    }

    public function resolveSort(RequestBaseParams $params): static
    {
        if ($params->sort_by) {
            $this->orderBy($params->sort_by, $params->sort_order->value);
        }

        return $this;
    }

    public function resolvePagination(RequestBaseParams $params): Collection|LengthAwarePaginator
    {
        if ($params->show_all) {
            return $this->get();
        }

        return $this->paginate($params->per_page, page: $params->page);
    }
}
