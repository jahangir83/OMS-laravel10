<?php

use Illuminate\Support\Facades\Route;

Route::resource("dashboard/roles", App\Http\Controllers\Manage\RoleController::class)->middleware('auth');
Route::resource("dashboard/permissions", App\Http\Controllers\Manage\PermissionController::class)->middleware('auth');
