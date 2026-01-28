<?php

use Illuminate\Support\Facades\Route;
use App\hrms\Controllers\UserController;
use App\hrms\Controllers\LeadCategoryController;
use App\hrms\Controllers\LeadController;

Route::prefix('api/hrms')->group(function () {
    Route::get('users', [UserController::class, 'index']);
    Route::post('users', [UserController::class, 'store']);
    Route::get('users/{user}', [UserController::class, 'show']);
    Route::put('users/{user}', [UserController::class, 'update']);
    Route::delete('users/{user}', [UserController::class, 'destroy']);

    Route::apiResource('lead-categories', LeadCategoryController::class);
    Route::apiResource('leads', LeadController::class);
});
