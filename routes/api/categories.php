<?php

declare(strict_types=1);

use App\Http\Controllers\Api;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->group(function () {
    Route::get('/', [Api\CategoryController::class, 'index']);
// });