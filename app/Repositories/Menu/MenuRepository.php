<?php

namespace App\Repositories\Menu;

use App\Interfaces\Menu\MenuRepositoryInterface;
use App\Models\Menu;
use Illuminate\Support\Collection;

class MenuRepository implements MenuRepositoryInterface
{
    public function getMenus(int $limit, int $offset, array $where = null): Collection
    {
        return Menu::when($where, function($query) use($where) {
            return $query->where($where);
        })
        ->limit($limit)
        ->offset($offset)
        ->get();
    }

    public function getCount(): int
    {
        return Menu::count();
    }
}