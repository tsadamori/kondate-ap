<?php

namespace App\Interfaces\Menu;

use App\Models\Menu;
use Illuminate\Support\Collection;

interface MenuRepositoryInterface
{
    public function getMenus(int $limit, int $offset, array $where = null): Collection;
    public function getCount(): int;
    public function getMenu(int $menuId): Menu;
    public function createMenu(array $payload): Menu;
    public function updateMenu(int $menuId, array $payload): Menu;
    public function deleteMenu(int $menuId): void;
}