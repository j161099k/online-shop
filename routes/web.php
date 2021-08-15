<?php

use App\Http\Controllers\User\AddressController;
use App\Http\Controllers\User\CatalogController;
use App\Http\Controllers\User\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::prefix('/catalog')->group(function() {

    Route::get('/', [CatalogController::class, 'products'])->name('catalog.products');
    Route::get('/combos', [CatalogController::class, 'combos'])->name('catalog.combos');
    Route::get('/products/{id}', [CatalogController::class, 'showProduct'])->name('catalog.showProduct');
    Route::get('/combos/{id}', [CatalogController::class, 'showCombo'])->name('catalog.showCombo');

});


Route::resources([
    'addresses' => AddressController::class,
    'orders' => OrderController::class,
]);
