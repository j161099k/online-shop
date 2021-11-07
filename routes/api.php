<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ComboController;
use App\Http\Controllers\Admin\IngredientController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProviderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/admin/categories/{category}/products', [CategoryController::class, 'findProductsByCategory'])->name('admin.categories.findProductsByCategory');

Route::apiResource('admin/orders', OrderController::class, [
    'except' => ['store', 'destroy'],
]);

Route::apiResources([
    'admin/ingredients' => IngredientController::class,
    'admin/products' => ProductController::class,
    'admin/combos' => ComboController::class,
    'admin/providers' => ProviderController::class,
]);
