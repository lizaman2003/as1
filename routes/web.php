<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\UserController;

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
Route::post('/register',[UserController::class, 'register'])->name('register');
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::get('/admin', [UserController::class, 'admin'])->name('admin');
Route::get('/profile', [UserController::class, 'profile'])->name('profile');