<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::get(uri: '/', action: Dashboard::class)->name(name: 'dashboard');

    Route::get(uri: '/products', action: [ProductController::class, 'index'])->name(name: 'products.index');
    Route::get(uri: '/products/create', action: [ProductController::class, 'create'])->name(name: 'products.create');
    Route::post(uri: '/products', action: [ProductController::class, 'store'])->name(name: 'products.store');
    Route::get(uri: '/products/{product}/edit', action: [ProductController::class, 'edit'])->name(name: 'products.edit');
    Route::put(uri: '/products/{product}', action: [ProductController::class, 'update'])->name(name: 'products.update');
    Route::get(uri: '/products/{product}', action: [ProductController::class, 'show'])->name(name: 'products.show');
    Route::delete(uri: '/products/{product}', action: [ProductController::class, 'destroy'])->name(name: 'products.destroy');

    Route::get('/products/{product}/prices', [PriceController::class, 'index'])->name('products.prices.index');
    Route::get('/products/{product}/prices/create', [PriceController::class, 'create'])->name('products.prices.create');
    Route::post('/products/{product}/prices', [PriceController::class, 'store'])->name('products.prices.store');
    Route::get('/products/{product}/prices/{price}/edit', [PriceController::class, 'edit'])->name('products.prices.edit');
    Route::put('/products/{product}/prices/{price}', [PriceController::class, 'update'])->name('products.prices.update');
    Route::delete('/product/{product}/prices/{price}', [PriceController::class, 'destroy'])->name('products.prices.destroy');
});

Auth::routes();
