<?php

use App\Http\Controllers\Api\v1\DepartmentController;
use App\Http\Controllers\Api\v1\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('departments', DepartmentController::class)
    ->except(['create']);

Route::resource('employees', EmployeeController::class);
