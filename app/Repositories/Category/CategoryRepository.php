<?php

namespace App\Repositories\Category;

use App\Interfaces\Category\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Support\Collection;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getCategories(int $limit, int $offset, array $where = null): Collection
    {
        return Category::when($where, function ($query) use ($where) {
            return $query->where($where);
        })
            ->limit($limit)
            ->offset($offset)
            ->get();
    }

    public function getCount(): int
    {
        return Category::count();
    }
}
