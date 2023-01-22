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
    ROute::prefix('/menus')->group(__DIR__ . '/api/menus.php');
    Route::prefix('/categories')->group(__DIR__ . '/api/categories.php');
    Route::prefix('/users')->group(__DIR__ . '/api/users.php');
});