<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request): JsonResponse
    {
        return response()->json($this->userService->indexUsers($request->limit, $request->offset));
    }

    public function show(int $userId): JsonResponse
    {
        return response()->json($this->userService->showUser($userId));
    }
}
