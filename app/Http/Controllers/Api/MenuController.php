<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Services\Menu\MenuService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    private $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index(Request $request): JsonResponse
    {
        return response()->json($this->menuService->indexMenus(
            $request->limit,
            $request->offset
        ));
    }

    public function create(CreateMenuRequest $request): JsonResponse
    {
        $payload = [
            'userId' => $request->userId,
            'categoryIds' => $request->categoryIds,
            'name' => $request->name,
            'ingredients' => $request->ingredients,
            'imageData' => $request->imageData ?? null,
            'relatedLink' => $request->relatedLink ?? null,
            'description' => $request->description ?? null,
        ];
        return response()->json($this->menuService->createMenu($payload));
    }

    public function show(int $menuId): JsonResponse
    {
        return response()->json($this->menuService->showMenu($menuId));
    }

    public function update(UpdateMenuRequest $request, int $menuId): JsonResponse
    {
        $payload = [
            'userId' => $request->userId,
            'categoryIds' => $request->categoryIds,
            'name' => $request->name,
            'ingredients' => $request->ingredients,
            'imageData' => $request->imageData ?? null,
            'relatedLink' => $request->relatedLink ?? null,
            'description' => $request->description ?? null,
        ];
        return response()->json($this->menuService->updateMenu($menuId, $payload));
    }

    public function delete(int $menuId): void
    {
        $this->menuService->deleteMenu($menuId);
    }
}
