<?php

namespace App\Services\Category;

use App\Interfaces\Category\CategoryServiceInterface;
use App\Models\Category;
use App\Repositories\Category\CategoryRepository;

class CategoryService implements CategoryServiceInterface
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function indexCategories(?int $limit, ?int $offset): array
    {
        $limit = $limit ?? 10;
        $offset = $offset ?? 0;

        $categories = $this->categoryRepository->getCategories($limit, $offset)->toArray();
        $count = $this->categoryRepository->getCount();

        return [
            'metadata' => [
                'limit' => $limit,
                'offset' => $offset,
                'count' => $count,
            ],
            'categories' => $categories,
        ];
    }
}
