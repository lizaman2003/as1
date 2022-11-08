<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;

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

Route::get('/',[CatalogController::class, 'catalog'])->name('home');
Route::get('/category{id}',[CatalogController::class, 'catalog'])->name('category');
Route::get('/sorting',[CatalogController::class, 'sorting']);

Route::get('/item{id}',[CatalogController::class, 'item'])->name('item');
Route::middleware(['guest'])->group(function () {
Route::post('/register',[UserController::class, 'register'])->name('register');
Route::post('/login', [UserController::class, 'login'])->name('login');
});
Route::middleware(['auth'])->group(function(){
Route::get('/admin', [UserController::class, 'admin'])->name('admin');
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::get('/cart/delete{id}', [CartController::class, 'deleateCart'])->name('deleateCart');
Route::get('/cart/add', [CartController::class, 'addCart'])->name('addCart');
});