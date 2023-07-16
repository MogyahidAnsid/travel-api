<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Admin;

Route::middleware(['auth:sanctum', 'role:admin'])
    ->prefix('admin')
    ->name('admin-travel.')
    ->group(function () {
        Route::get('travels', [Admin\TravelController::class, 'index'])->name('index');
        Route::post('travels', [Admin\TravelController::class, 'store'])->name('store');
    });
