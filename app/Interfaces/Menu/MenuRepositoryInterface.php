<?php

namespace App\Interfaces\Menu;

use Illuminate\Support\Collection;

interface MenuRepositoryInterface
{
    public function getMenus(int $limit, int $offset, array $where = null): Collection;
    public function getCount(): int;
}