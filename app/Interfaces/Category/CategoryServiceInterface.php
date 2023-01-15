<?php

namespace App\Interfaces\Category;

interface CategoryServiceInterface
{
    public function indexCategories(?int $limit, ?int $offset): array;
}
