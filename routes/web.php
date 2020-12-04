<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
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
Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create')->middleware(['auth', 'admin']);
Route::post('/products/store', [ProductsController::class, 'store'])->name('products.store')->middleware(['auth', 'admin']);
Route::post('/products/check_validate', [ProductsController::class, 'validateProduct'])->name('products.validation');
Route::get('/products/{id}', [ProductsController::class, 'show'])->name('products.show');
Route::get('/products/edit/{id}', [ProductsController::class, 'edit'])->name('products.edit')->middleware(['auth', 'admin']);
Route::post('/products/update/{id}', [ProductsController::class, 'update'])->name('products.update')->middleware(['auth', 'admin']);
Route::delete('/products/destroy/{id}', [ProductsController::class, 'destroy'])->name('products.destroy')->middleware(['auth', 'admin']);
Route::get('/search', [ProductsController::class, 'search'])->name('products.search');
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

Route::match(['get', 'post'],'/test', [ProductsController::class, 'test'])->name('products.test');
