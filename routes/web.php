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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [\App\Http\Controllers\MessagesController::class, 'index'])->name('home');
Route::post('/home', [\App\Http\Controllers\MessagesController::class, 'save_message'])->name('save_message');

Route::get('/new', [\App\Http\Controllers\MessagesController::class, 'new_chat'])->name('new_chat');

Route::post('/search_users', [\App\Http\Controllers\MessagesController::class, 'search_users'])->name('search_users');
