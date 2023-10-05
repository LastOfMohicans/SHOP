<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
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

Route::get('/',[ PageController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::resource('test', TestController::class);

//Route::resource('users', UserController::class);

Route::resource('catalog', CatalogController::class)->parameters([
    'catalog' => 'slug'
]);

Route::prefix('cart')->group(function () {

    Route::get('/', [CartController::class, 'index'])->name('cart.index');

    Route::get('add/{productId}', [CartController::class, 'add'])
    ->name('cart.add');

    Route::patch('update', [CartController::class, 'update'])
    ->name('cart.update');

    Route::get('drop', [CartController::class, 'drop'])
    ->name('cart.drop');

    Route::get('destroy', [CartController::class, 'destroy'])
    ->name('cart.destroy');

    Route::get('checkout', [CartController::class, 'checkout'])
    ->name('cart.checkout');

    Route::get('success/{orderId}', [CartController::class, 'success'])->name('cart.success');
});

Route::resource('order', OrderController::class)->only([
    'store', 'show', 'update', 'destroy'
]);
