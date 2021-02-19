<?php

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/links', [App\Http\Controllers\LinksController::class, 'index'])->middleware('auth')->name('links');

<<<<<<< HEAD
Route::get('/go/{code}', [App\Http\Controllers\LinksController::class, 'shortenLink'])->middleware('auth')->name('shorten.link');
=======
Route::get('/go/{code}', [App\Http\Controllers\LinksController::class, 'shortenLink'])->name('shorten.link');

>>>>>>> 03be0f083c4495686deb16b0d3e6a1f149d1beaf
