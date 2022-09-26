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

    public function getMenu(int $menuId): Menu
    {
        return Menu::findOrFail($menuId);
    }

    public function createMenu(array $payload): Menu
    {
        return Menu::create($payload);
    }

    public function updateMenu(int $menuId, array $payload): Menu
    {
        return Menu::findOrFail($menuId)->update($payload);
    }

    public function deleteMenu(int $menuId): void
    {
        Menu::findOrFail($menuId)->delete();
    }
}