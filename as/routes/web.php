<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;

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
Route::get('/sorting',[CatalogController::class, 'sorting'])->name('sorting');
