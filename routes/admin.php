<?php

use App\Http\Controllers\Admin\ComboController;
use App\Http\Controllers\Admin\IngredientController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProviderController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class, 'index'])->name('admin.index');

Route::get('/providers', [ProviderController::class, 'load'])->name('admin.providers');
Route::get('/orders', [OrderController::class, 'load'])->name('admin.orders');

Route::get('/ingredients', [IngredientController::class, 'load'])->name('admin.ingredients');
Route::get('/products', [ProductController::class, 'load'])->name('admin.products');
Route::get('/combos', [ComboController::class, 'load'])->name('admin.combos');
