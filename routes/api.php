<?php

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

        // Travels Route
        Route::get('travels', [TravelController::class, 'index'])->name('travel.index');
        Route::get('travels/{travel:slug}', [TravelController::class, 'show'])->name('travel.show');
    }
);
