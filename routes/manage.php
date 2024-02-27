<?php

use Illuminate\Support\Facades\Route;

// Roles
Route::resource("dashboard/roles", App\Http\Controllers\Manage\RoleController::class)->middleware('auth');
Route::get("dashboard/roles/{roleId}/delete", [App\Http\Controllers\Manage\RoleController::class, 'destroy'])->middleware('auth');

Route::get('dashboard/roles/{roleId}/give-permission', [App\Http\Controllers\Manage\RoleController::class, 'addPermissionToRole'])->middleware('auth');
Route::put('dashboard/roles/{roleId}/give-permission', [App\Http\Controllers\Manage\RoleController::class, 'givePermissionToRole'])->middleware('auth');

// Permission
Route::resource("dashboard/permissions", App\Http\Controllers\Manage\PermissionController::class)->middleware('auth');
Route::get("dashboard/permissions/{permissionId}/delete", [App\Http\Controllers\Manage\PermissionController::class, 'destroy'])->middleware('auth');


// Users
Route::resource("dashboard/users", App\Http\Controllers\Users\UserContrller::class);
Route::get("dashboard/users/{roleId}/delete", [App\Http\Controllers\Users\UserContrller::class, 'destroy'])->middleware('auth');
