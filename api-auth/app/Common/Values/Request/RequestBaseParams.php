<?php

namespace App\Common\Values\Request;

use App\Common\Enums\SortOrder;

class RequestBaseParams
{
    public function __construct(
        public SortOrder $sort_order = SortOrder::ASC,
        public int $page = 1,
        public ?string $sort_by = null,
        public ?int $per_page = null,
        public ?bool $show_all = false
    ) {
        if (!$this->per_page) {
            $this->per_page = config('general.items_per_page', 5);
        }
    }

    public static function from(array $values): static
    {
        if (isset($values['sort_order']) && !$values['sort_order'] instanceof SortOrder) {
            $values['sort_order'] = SortOrder::from($values['sort_order']);
        }

        return new static(...$values);
    }
}
