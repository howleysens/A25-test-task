<?php

use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\TransactionController;
use Illuminate\Support\Facades\Route;

Route::post('/employees', [EmployeeController::class, 'store']);
Route::post('/transaction', [TransactionController::class, 'store']);
Route::get('/employees/unpaid-salaries', [TransactionController::class, 'getSalaries']);
Route::post('/employees/pay-salaries', [TransactionController::class, 'paySalaries']);
//Route::apiResource('/employees', EmployeeController::class);
//Route::apiResource('/transactions', TransactionController::class);
