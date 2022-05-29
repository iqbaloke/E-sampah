<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagsController;
use Illuminate\Support\Facades\Route;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::middleware('check.role')->group(function () {


        Route::prefix('category')->group(function () {

            Route::get('', [CategoryController::class, 'index'])->middleware('permission:Show Category');
            Route::get('/{category}', [CategoryController::class, 'show'])->middleware('permission:Show Category');

            Route::group(['middleware' => ['role:super admin|admin']], function () {

                Route::post('', [CategoryController::class, 'store'])->middleware('permission:Create Category');
                Route::patch('/{category}', [CategoryController::class, 'update'])->middleware('permission:Update Category');
                Route::delete('/{category}', [CategoryController::class, 'destroy'])->middleware('permission:Delete Category');
            });
        });

        Route::prefix('tag')->group(function () {

            Route::get('', [TagsController::class, 'index'])->middleware('permission:Show Tag');
            Route::get('/{tag}', [TagsController::class, 'show'])->middleware('permission:Show Tag');

            Route::group(['middleware' => ['role:super admin|admin']], function () {

                Route::post('', [TagsController::class, 'store'])->middleware('permission:Create Tag');
                Route::patch('/{tag}', [TagsController::class, 'update'])->middleware('permission:Update Tag');
                Route::delete('/{tag}', [TagsController::class, 'destroy'])->middleware('permission:Delete Tag');
            });
        });
    });
});
