<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\MenuController;
use App\Http\Controllers\OrderController;

// ─── Customer Entry ───────────────────────────────────────────
Route::get('/entry', fn() => view('entry'))->name('entry');

// ─── Customer Menu & Ordering ─────────────────────────────────
Route::get('/', [MenuController::class, 'index'])->name('home');
Route::get('/HotpotSoup', fn() => view('customer.HotpotSoup'))->name('HotpotSoup');
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::post('/cart/add', [MenuController::class, 'addToCart'])->name('cart.add');
Route::post('/checkout', [MenuController::class, 'checkout'])->name('checkout');
Route::view('/thank-you', 'customer.thankyou')->name('thankyou');

// ─── Admin Auth ───────────────────────────────────────────────
Route::get('/login', fn() => view('admin.login'))->name('login');
Route::get('/logout', fn() => redirect()->route('login'))->name('logout');

// ─── Admin Panel ──────────────────────────────────────────────
Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');
Route::get('/kitchen', fn() => view('admin.kitchen'))->name('kitchen');

// ─── Order API (used by kitchen/dashboard JS) ─────────────────
Route::get('/api/kitchen-orders', [OrderController::class, 'getKitchenOrders']);
Route::post('/api/orders/{id}/cooking', [OrderController::class, 'markCooking']);
Route::post('/api/orders/{id}/ready', [OrderController::class, 'markReady']);
Route::delete('/api/orders/{id}', [OrderController::class, 'deleteOrder']);
Route::delete('/api/orders/clear-completed', [OrderController::class, 'clearCompleted']);

// ─── Misc ─────────────────────────────────────────────────────
Route::get('/welcome', fn() => view('welcome'))->name('welcome');
