<?php

declare(strict_types=1);

use App\Http\Controllers\Api;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->group(function () {
    Route::get('/', [Api\MenuController::class, 'index']);
    Route::post('/', [Api\MenuController::class, 'create']);
    Route::get('/{menuId}', [Api\MenuController::class, 'show']);
    Route::put('/{menuId}', [Api\MenuController::class, 'update']);
    Route::delete('//{menuId}', [Api\MenuController::class, 'delete']);
// });