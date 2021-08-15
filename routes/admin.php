<?php

use App\Http\Controllers\Admin\ComboController;
use App\Http\Controllers\Admin\IngredientController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProviderController;
use Illuminate\Support\Facades\Route;

Route::prefix('/orders')->group(function() {
    Route::get('/', [OrderController::class, 'index'])->name('adminOrders.index');
    Route::get('/{id}', [OrderController::class, 'show'])->name('adminOrders.show');
});

Route::resources([
    'ingredients' => IngredientController::class,
    'products' => ProductController::class,
    'combos' => ComboController::class,
    'providers' => ProviderController::class,
]);