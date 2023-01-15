<?php

namespace App\Interfaces\Menu;

use App\Models\Menu;

interface MenuServiceInterface
{
    public function indexMenus(?int $limit, ?int $offset): array;
    public function showMenu(int $menuId): array;
    public function createMenu(array $payload): array;
    public function updateMenu(int $menuId, array $payload): array;
    public function deleteMenu(int $menuId): void;
}
