<?php

use App\Http\Controllers\Api\Category\PostCategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('post-categories')->group(function () {
    Route::get('/', [PostCategoryController::class, 'index']);
    Route::post('/', [PostCategoryController::class, 'store']);
    Route::get('{postCategory}', [PostCategoryController::class, 'show']);
    Route::put('{postCategory}', [PostCategoryController::class, 'update']);
    Route::delete('{postCategory}', [PostCategoryController::class, 'destroy']);
});
