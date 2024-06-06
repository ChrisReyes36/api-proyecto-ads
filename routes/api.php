<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\PermissionsController;
use App\Http\Controllers\Api\Auth\RolesController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    // Auth
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);

    Route::middleware('auth:api')->group(function () {

        // Auth
        Route::get('user', [AuthController::class, 'user']);
        Route::post('logout', [AuthController::class, 'logout']);

        //Roles
        Route::prefix('roles')->group(function () {

            Route::get('/', [RolesController::class, 'index']);
            Route::post('/', [RolesController::class, 'store']);
            Route::put('/{id}', [RolesController::class, 'update']);
            Route::delete('/{id}', [RolesController::class, 'destroy']);
        });

        //Permisos
        Route::prefix('permisos')->group(function () {

            Route::get('/', [PermissionsController::class, 'index']);
            Route::post('/', [PermissionsController::class, 'store']);
            Route::put('/{id}', [PermissionsController::class, 'update']);
            Route::delete('/{id}', [PermissionsController::class, 'destroy']);
        });
    });
});
