<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AuthenticationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|   
| Here is where you can register API routes for your application.
|
*/

// Public routes
Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

// Protected routes (auth:sanctum middleware)
Route::middleware('auth:sanctum')->group(function () {

    // Authenticated user info
    Route::get('/user', function (Request $request) {
        return response()->json($request->user());
    });

    // User Management
    Route::get('/get-users', [UserController::class, 'getUsers']);
    Route::post('/add-users', [UserController::class, 'addUser']);
    Route::put('/edit-users/{id}', [UserController::class, 'editUser']);
    Route::delete('/delete-users/{id}', [UserController::class, 'deleteUser']);

    // Client Management
    Route::get('/get-clients', [ClientController::class, 'index']);
    Route::post('/add-clients', [ClientController::class, 'store']);
    Route::put('/edit-clients/{id}', [ClientController::class, 'update']);
    Route::delete('/delete-clients/{id}', [ClientController::class, 'destroy']);

    // Role Management
    Route::get('/get-roles', [RoleController::class, 'getRoles']);
    Route::post('/add-roles', [RoleController::class, 'addRole']);
    Route::put('/edit-roles/{id}', [RoleController::class, 'editRole']);
    Route::delete('/delete-roles/{id}', [RoleController::class, 'deleteRole']);
 // Supply Request Management
    Route::get('/get-supply-requests', [SupplyRequestController::class, 'index']);
    Route::post('/add-supply-request', [SupplyRequestController::class, 'store']);
    Route::put('/edit-supply-request/{id}', [SupplyRequestController::class, 'update']);
    Route::delete('/delete-supply-request/{id}', [SupplyRequestController::class, 'destroy']);

    // Delivery Supply Management
    Route::get('/get-delivery-supplies', [DeliverySupplyController::class, 'index']);
    Route::post('/add-delivery-supply', [DeliverySupplyController::class, 'store']);
    Route::put('/edit-delivery-supply/{id}', [DeliverySupplyController::class, 'update']);
    Route::delete('/delete-delivery-supply/{id}', [DeliverySupplyController::class, 'destroy']);
    // Logout
    Route::post('/logout', [AuthenticationController::class, 'logout']);
});
