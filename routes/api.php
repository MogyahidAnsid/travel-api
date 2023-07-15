<?php

use App\Http\Controllers\Api\V1\TourController;
use App\Http\Controllers\Api\V1\TravelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(
    function () {

        // Travels Routes
        Route::get('travels', [TravelController::class, 'index'])->name('Travels.index');
        // Route::get('travels/{travel:slug}', [TravelController::class, 'show'])->name('travels.show');

        // Tour Routes
        Route::get('travels/{travel:slug}/tours', [TourController::class, 'index'])->name('tours.index');
    }
);
