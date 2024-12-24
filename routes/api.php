<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WardrobeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OutfitController;




Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/wardrobe', [WardrobeController::class, 'index']);
    Route::get('/wardrobe/{id}', [WardrobeController::class, 'show']);
    Route::post('/wardrobe', [WardrobeController::class, 'store']);
    Route::put('/wardrobe/{id}', [WardrobeController::class, 'update']);
    Route::delete('/wardrobe/{id}', [WardrobeController::class, 'destroy']);

    Route::get('/item', [ItemController::class, 'index']);
    Route::get('/item/{id}', [ItemController::class, 'show']);
    Route::post('/item', [ItemController::class, 'store']);
    Route::put('/item/{id}', [ItemController::class, 'update']);
    Route::delete('/item/{id}', [ItemController::class, 'destroy']);

    Route::get('/outfit', [OutfitController::class, 'index']);
    Route::get('/outfit/{id}', [OutfitController::class, 'show']);
    Route::post('/outfit', [OutfitController::class, 'store']);
    Route::put('/outfit/{id}', [OutfitController::class, 'update']);
    Route::delete('/outfit/{id}', [OutfitController::class, 'destroy']);

});





