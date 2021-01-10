<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\ContactController;
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

Route::get('/products/section/{title}', [ProductsController::class, 'index'])->name('products.index');

Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create')->middleware(['auth', 'admin']);
Route::post('/products/store', [ProductsController::class, 'store'])->name('products.store')->middleware(['auth', 'admin']);
Route::post('/products/check_validate', [ProductsController::class, 'validateProduct'])->name('products.validation')->middleware(['auth', 'admin']);
Route::get('/products/show/{id}', [ProductsController::class, 'show'])->name('products.show');
Route::get('/products/edit/{id}', [ProductsController::class, 'edit'])->name('products.edit')->middleware(['auth', 'admin']);
Route::post('/products/update/{id}', [ProductsController::class, 'update'])->name('products.update')->middleware(['auth', 'admin']);
Route::delete('/products/destroy/{id}', [ProductsController::class, 'destroy'])->name('products.destroy')->middleware(['auth', 'admin']);

Route::get('/search', [ProductsController::class, 'search'])->name('products.search');
Route::get('/user', [UserController::class, 'index'])->name('user.index');

Route::get('/basket', [BasketController::class, 'index'])->name('basket.index');
Route::post('/basket/add/{id}', [BasketController::class, 'add'])->name('basket.add');
Route::post('/basket/plus/{id}', [BasketController::class, 'plus'])->name('basket.plus');
Route::post('/basket/minus/{id}', [BasketController::class, 'minus'])->name('basket.minus');
Route::post('/basket/clear/{id}', [BasketController::class, 'clear'])->name('basket.clear')->middleware(['admin']);

Route::get('/delivery', [ContactController::class, 'delivery'])->name('contact.delivery.index');
Route::get('/about',[ContactController::class, 'about'])->name('contact.about.index');

Route::get('/office', [AdminController::class, 'index'])->name('office.index');
/*Route::post('/admin/create-user', [AdminController::class,'create_user'])->name('admin.create-user');
Route::post('/admin/create-product', [AdminController::class,'create_product'])->name('admin.create-product');
Route::post('/admin/create-section', [AdminController::class,'create_section'])->name('admin.create-section');
Route::post('/admin/create-category', [AdminController::class,'create_category'])->name('admin.create-category');
Route::post('/admin/create-brand', [AdminController::class,'create_brand'])->name('admin.create-brand');
Route::delete('/admin/destroy/{name}/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');*/
