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

Route::get('/', function () {
    return redirect('/all');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/all', [App\Http\Controllers\PostController::class, 'index'])->middleware('auth');

Route::get('/create', [App\Http\Controllers\PostController::class, 'create'])->middleware(['auth','checkRole']);

Route::post('/store', [App\Http\Controllers\PostController::class, 'store'])->middleware(['auth','checkRole']);

Route::get('/role/create', [App\Http\Controllers\RoleController::class, 'createRole'])->middleware(['auth','checkIfAdmin']);

Route::post('/role/store', [App\Http\Controllers\RoleController::class, 'storeRole'])->middleware(['auth','checkIfAdmin']);

Route::get('/permission/create', [App\Http\Controllers\RoleController::class, 'createPermission'])->middleware(['auth','checkIfAdmin']);

Route::post('/permission/store', [App\Http\Controllers\RoleController::class, 'storePermission'])->middleware(['auth','checkIfAdmin']);

Route::get('/userNotAllowed', function () {
    return 'У вас нет прав доступа';
});