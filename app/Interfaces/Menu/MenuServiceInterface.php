<?php

namespace App\Interfaces\Menu;

use App\Models\Menu;

interface MenuServiceInterface
{
    public function indexMenus(?int $limit, ?int $offset): array;
}