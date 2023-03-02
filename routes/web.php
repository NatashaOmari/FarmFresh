<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

//auth routes
Auth::routes();

Route::post('/option', [App\Http\Controllers\OptionController::class, 'chooseOption'])->name('option');
Route::get('/option/fauna/index', [App\Http\Controllers\FaunaController::class, 'index'])->name('fauna.index');
Route::get('/option/flora/index', [App\Http\Controllers\FloraController::class, 'index'])->name('flora.index');
Route::get('/option/fauna/create', [App\Http\Controllers\FaunaController::class, 'create'])->name('fauna.create');
Route::get('/option/fauna/create', [App\Http\Controllers\FaunaController::class, 'store'])->name('fauna.store');

//home routes
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/product', [App\Http\Controllers\HomeController::class, 'product'])->name('product');

//admin routes
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');