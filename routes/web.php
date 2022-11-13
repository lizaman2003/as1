<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;

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
Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::get('/cart/delete{id}', [CartController::class, 'deleateCart'])->name('deleateCart');
Route::get('/cart/add', [CartController::class, 'addCart'])->name('addCart');
Route::get('/cart/changeCount', [CartController::class, 'changeCount'])->name('changeCount');
Route::post('/cart/ordering', [CartController::class, 'ordering'])->name('ordering');
Route::get('/myorders', [OrderController::class, 'myOrders'])->name('myOrders');
Route::get('/myorders/delete/{id}', [OrderController::class, 'deleteOrder'])->name('deleteOrder');

Route::get('/admin/addItem', [AdminController::class, 'addItemPage'])->name('addItemPage');
Route::post('/admin/addItem', [AdminController::class, 'addItem'])->name('addItem');

Route::get('/admin/edititem/{id}', [AdminController::class, 'edititemPage'])->name('edititemPage');
Route::post('/admin/edititem', [AdminController::class, 'edititem'])->name('edititem');

Route::get('/admin/deleteitem/{id}', [AdminController::class, 'deleteItem'])->name('deleteItem');
Route::get('/admin/orders', [AdminController::class, 'ordersPage'])->name('ordersPage');

Route::get('/admin/order', [AdminController::class, 'orderPage'])->name('orderPage');
});