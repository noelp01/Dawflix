<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/logout', function () {
    return 'Logout usuari';
});

Route::get('/catalog', [CatalogController::class, 'getIndex']);

Route::get('/catalog/show/{id}', [CatalogController::class, 'getShow']);

Route::get('/catalog/create', [CatalogController::class, 'getCreate'])->middleware('auth');

Route::get('/catalog/edit/{id}', [CatalogController::class, 'getEdit'])->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/catalog/create', [CatalogController::class, 'postCreate']);

Route::put('/catalog/edit/{id}', [CatalogController::class, 'putEdit']);

Route::put('/catalog/rent/{id}', [CatalogController::class, 'putRent'])->middleware('auth');

Route::put('/catalog/return/{id}', [CatalogController::class, 'putReturn'])->middleware('auth');

Route::delete('/catalog/delete/{id}', [CatalogController::class, 'deleteMovie'])->middleware('auth');

Route::post('/catalog/review/create', [CatalogController::class, 'unaOpinio']);

Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->middleware('auth');

Route::get('/category/create', [CategoryController::class, 'getCreate']);

Route::put('/category/create', [CategoryController::class, 'putCreate']);

Route::post('/category', [CategoryController::class, 'postStore']);

Route::get('/category/{id}', [CategoryController::class, 'getShow']);

Route::get('/category/{id}/edit', [CategoryController::class, 'getEdit']);

Route::put('/category/{id}', [CategoryController::class, 'putUpdate']);

Route::delete('/category/{id}', [CategoryController::class, 'deleteCategory']);




