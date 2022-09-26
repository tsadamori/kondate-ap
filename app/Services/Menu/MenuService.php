<?php

namespace App\Services\Menu;

use App\Interfaces\Menu\MenuServiceInterface;
use App\Models\Menu;
use App\Repositories\Menu\MenuRepository;
use Illuminate\Support\Facades\Auth;

class MenuService implements MenuServiceInterface
{
    public function __construct(MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }

    public function indexMenus(?int $limit, ?int $offset): array
    {
        $limit = $limit ?? 10;
        $offset = $offset ?? 0;
        $where = Auth::id() ? ['user_id' => Auth::id()] : null;

        $menus = $this->menuRepository->getMenus($limit, $offset, $where)->toArray();
        $count = $this->menuRepository->getCount();

        return [
            'metadata' => [
                'limit' => $limit,
                'offset' => $offset,
                'count' => $count,
            ],
            'menus' => $menus,
        ];
    }

    public function showMenu(int $menuId): array
    {
        return $this->menuRepository->getMenu($menuId)->toArray();
    }

    public function createMenu(array $payload): array
    {
        return $this->menuRepository->createMenu($payload)->toArray();
    }

    public function updateMenu(int $menuId, array $payload): array
    {
        return $this->menuRepository->updateMenu($payload)->toArray();
    }

    public function deleteMenu(int $menuId): void
    {
        $this->menuRepository->deleteMenu($menuId);
    }
}