<?php

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

Route::get('/go/{code}', [App\Http\Controllers\LinksController::class, 'shortenLink'])->name('shorten.link');

