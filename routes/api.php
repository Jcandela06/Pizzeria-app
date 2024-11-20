<?php

use App\Http\Controllers\api\ClientController;
use App\Http\Controllers\api\EmployeeController;
use App\Http\Controllers\api\PizzaController;
use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('users', UserController::class);
Route::apiResource('clients', ClientController::class);
Route::apiResource('employees', EmployeeController::class);
Route::apiResource('pizzas', PizzaController::class);