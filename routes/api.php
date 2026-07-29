<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

Route::middleware('auth:sanctum')->group(function () {
    // Kitchen Orders
    Route::get('/kitchen/orders', [OrderController::class, 'getKitchenOrders'])->name('api.kitchen.orders');

    // Kitchen Order Updates
    Route::post('/kitchen/order/{id}/cooking', [OrderController::class, 'markCooking']);
    Route::post('/kitchen/order/{id}/ready', [OrderController::class, 'markReady']);
    Route::delete('/kitchen/order/{id}', [OrderController::class, 'deleteOrder']);
    Route::post('/kitchen/clear-completed', [OrderController::class, 'clearCompleted']);
});
