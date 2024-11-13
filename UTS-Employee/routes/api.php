<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


// semua route dibawah ini hanya bisa diakses oleh user yang sudah login
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/employees', [EmployeeController::class, 'index']);
    Route::post('/employees', [EmployeeController::class, 'store']);
    Route::get('/employees/{id}', [EmployeeController::class, 'show']);
    Route::put('/employees/{id}', [EmployeeController::class, 'update']);
    Route::delete('/employees/{id}', [EmployeeController::class, 'destroy']);

    Route::get('/employees/search/{name}', [EmployeeController::class, 'search']);
    Route::get('/employees/status/active', [EmployeeController::class, 'active']);
    Route::get('/employees/status/inactive', [EmployeeController::class, 'inactive']);
    Route::get('/employees/status/terminated', [EmployeeController::class, 'terminated']);
});

