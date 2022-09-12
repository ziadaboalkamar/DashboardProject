<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\ServicesController;

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

Route::get('/users',[UserController::class,"index"])->name("user.index");
Route::get('/user/create',[UserController::class,"create"])->name("user.create");
Route::post('user/store',[UserController::class,"store"])->name("user.store");
Route::get('/user/edit/{id}',[UserController::class,"edit"])->name("user.edit");
Route::post('user/update/{id}',[UserController::class,"update"])->name("user.update");
Route::get('user/delete/{id}',[UserController::class,"delete"])->name("user.delete");

Route::get('/services',[ServicesController::class,"index"])->name("service.index");
Route::post('/services',[ServicesController::class,"store"])->name("service.store");



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
