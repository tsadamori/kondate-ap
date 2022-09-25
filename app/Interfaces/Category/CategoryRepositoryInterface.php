<?php

namespace App\Interfaces\Category;

use Illuminate\Support\Collection;

interface CategoryRepositoryInterface
{
    public function getCategories(int $limit, int $offset, array $where = null): Collection;
    public function getCount(): int;
}