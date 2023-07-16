<?php

use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\TravelController;
use App\Http\Controllers\Api\V1\TourController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

        // Auth Routes
        Route::post('login', LoginController::class);

        // Travels Routes
        Route::get('travels', [TravelController::class, 'index'])->name('Travels.index');
        // Route::get('travels/{travel:slug}', [TravelController::class, 'show'])->name('travels.show');

        // Tour Routes
        Route::get('travels/{travel:slug}/tours', [TourController::class, 'index'])->name('tours.index');

        // Admin Routes
        require __DIR__ . '/api/admin.php';
    }
);
