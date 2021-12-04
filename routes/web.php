<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Public\AddressController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/user/addresses', [AddressController::class, 'index'])->name('user.addresses');
Route::view('/user/cart', 'public.cart')->name('user.cart');

Route::get('/products/{product}', [HomeController::class, 'showProduct'])->name('product');


Route::get('/test', function () {
    $products = App\Models\Product::select('id', 'name')->get();
    return view('test', compact('products'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
