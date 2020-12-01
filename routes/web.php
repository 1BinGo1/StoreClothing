<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductsController;
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

Auth::routes();

Route::get('/', [ProductsController::class, 'home'])->name('products.home');
Route::get('/products', [ProductsController::class, 'index'])->name('products.index');

Route::match(['get', 'post'],'/products/create', [ProductsController::class, 'index'])->name('products.create');
Route::get('/products/{id}', [ProductsController::class, 'show'])->name('products.show');
Route::match(['get', 'post'],'/products/edit/{id}', [ProductsController::class, 'edit'])->name('products.edit');
