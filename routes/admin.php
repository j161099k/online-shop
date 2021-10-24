<?php

use App\Http\Controllers\Admin\ComboController;
use App\Http\Controllers\Admin\IngredientController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class, 'index'])->name('admin.index');

Route::get('/providers', [AdminController::class, 'providers'])->name('admin.providers');
Route::get('/orders', [AdminController::class, 'orders'])->name('admin.orders');

Route::get('/ingredients', [IngredientController::class, 'load'])->name('admin.ingredients');
Route::get('/products', [AdminController::class, 'products'])->name('admin.products');
Route::get('/combos', [ComboController::class, 'load'])->name('admin.combos');
