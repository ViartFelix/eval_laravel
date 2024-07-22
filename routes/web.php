<?php

use App\Http\Controllers\BookController;
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

Route::controller(BookController::class)->group(function () {
    Route::get('/', 'index')->name('books.index');
    Route::get('/create', 'create')->name('books.create');
    Route::post('/create', 'store')->name('books.store');
    Route::get('/{id}/edit', 'edit')->name('books.edit');
    Route::post('/{id}/edit', 'update')->name('books.update');
    Route::delete('/{id}', 'destroy')->name('books.destroy');
});


