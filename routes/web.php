<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookmarksController;

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

Route::get('/home', [BookmarksController::class, 'index'])->name('home');
Route::post('/store', [BookmarksController::class, 'store'])->name('bookmarks.store');
Route::delete('/bookmarks/{id}', [BookmarksController::class, 'destroy'])->name('bookmarks.delete');
