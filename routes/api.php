<?php

use App\Http\Controllers\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/v1')->group(function () {
    Route::get('/menus', [Api\MenuController::class, 'index']);
    Route::post('/menus', [Api\MenuController::class, 'create']);
    Route::get('/menus/{menuId}', [Api\MenuController::class, 'show']);
    Route::put('/meus/{menuId}', [Api\MenuController::class, 'update']);
    Route::delete('/menus/{menuId}', [Api\MenuController::class, 'delete']);

    Route::get('/categories', [Api\CategoryController::class, 'index']);

    Route::get('/users', [Api\UserController::class, 'index']);
    Route::get('/users/{userId}', [Api\UserController::class, 'show']);
});