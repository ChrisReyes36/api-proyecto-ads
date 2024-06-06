<?php

use App\Http\Controllers\Api\AlertaController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\PermissionsController;
use App\Http\Controllers\Api\Auth\RolesController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\ContratoController;
use App\Http\Controllers\Api\FiltroController;
use App\Http\Controllers\Api\InventarioPiezaController;
use App\Http\Controllers\Api\MantenimientoController;
use App\Http\Controllers\Api\OrdenTrabajoController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    // Auth
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);

    Route::middleware('auth:api')->group(function () {

        // Auth
        Route::get('user', [AuthController::class, 'user']);
        Route::post('logout', [AuthController::class, 'logout']);

        //Permisos
        Route::prefix('permisos')->group(function () {

            Route::get('/', [PermissionsController::class, 'index']);
            Route::post('/', [PermissionsController::class, 'store']);
            Route::put('/{id}', [PermissionsController::class, 'update']);
            Route::delete('/{id}', [PermissionsController::class, 'destroy']);
        });

        //Roles
        Route::prefix('roles')->group(function () {

            Route::get('/', [RolesController::class, 'index']);
            Route::post('/', [RolesController::class, 'store']);
            Route::put('/{id}', [RolesController::class, 'update']);
            Route::delete('/{id}', [RolesController::class, 'destroy']);
        });

        //Usuarios
        Route::prefix('usuarios')->group(function () {

            Route::get('/', [UserController::class, 'index']);
            Route::post('/', [UserController::class, 'store']);
            Route::put('/{id}', [UserController::class, 'update']);
            Route::delete('/{id}', [UserController::class, 'destroy']);
        });

        //Clientes
        Route::prefix('clientes')->group(function () {

            Route::get('/', [ClienteController::class, 'index']);
            Route::post('/', [ClienteController::class, 'store']);
            Route::put('/{id}', [ClienteController::class, 'update']);
            Route::delete('/{id}', [ClienteController::class, 'destroy']);
        });

        //Filtros
        Route::prefix('filtros')->group(function () {

            Route::get('/', [FiltroController::class, 'index']);
            Route::post('/', [FiltroController::class, 'store']);
            Route::put('/{id}', [FiltroController::class, 'update']);
            Route::delete('/{id}', [FiltroController::class, 'destroy']);
        });

        //Contratos
        Route::prefix('contratos')->group(function () {

            Route::get('/', [ContratoController::class, 'index']);
            Route::post('/', [ContratoController::class, 'store']);
            Route::put('/{id}', [ContratoController::class, 'update']);
            Route::delete('/{id}', [ContratoController::class, 'destroy']);
        });

        //Alertas
        Route::prefix('alertas')->group(function () {

            Route::get('/', [AlertaController::class, 'index']);
            Route::post('/', [AlertaController::class, 'store']);
            Route::put('/{id}', [AlertaController::class, 'update']);
            Route::delete('/{id}', [AlertaController::class, 'destroy']);
        });

        //Mantenimientos
        Route::prefix('mantenimientos')->group(function () {

            Route::get('/', [MantenimientoController::class, 'index']);
            Route::post('/', [MantenimientoController::class, 'store']);
            Route::put('/{id}', [MantenimientoController::class, 'update']);
            Route::delete('/{id}', [MantenimientoController::class, 'destroy']);
        });

        //Inventario de piezas
        Route::prefix('inventario-piezas')->group(function () {

            Route::get('/', [InventarioPiezaController::class, 'index']);
            Route::post('/', [InventarioPiezaController::class, 'store']);
            Route::put('/{id}', [InventarioPiezaController::class, 'update']);
            Route::delete('/{id}', [InventarioPiezaController::class, 'destroy']);
        });

        //Ordenes de trabajo
        Route::prefix('ordenes-trabajo')->group(function () {

            Route::get('/', [OrdenTrabajoController::class, 'index']);
            Route::post('/', [OrdenTrabajoController::class, 'store']);
            Route::put('/{id}', [OrdenTrabajoController::class, 'update']);
            Route::delete('/{id}', [OrdenTrabajoController::class, 'destroy']);
        });
    });
});
