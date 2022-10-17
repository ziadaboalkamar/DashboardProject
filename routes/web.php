<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\ServicesController;
use App\Http\Controllers\Dashboard\SubServiceController;

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
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ //...
  
Route::get('/users',[UserController::class,"index"])->name("user.index");
Route::get('/user/create',[UserController::class,"create"])->name("user.create");
Route::post('user/store',[UserController::class,"store"])->name("user.store");
Route::get('/user/edit/{id}',[UserController::class,"edit"])->name("user.edit");
Route::post('user/update/{id}',[UserController::class,"update"])->name("user.update");
Route::get('user/delete/{id}',[UserController::class,"delete"])->name("user.delete");

Route::get('/services',[ServicesController::class,"index"])->name("service.index");
Route::post('/services',[ServicesController::class,"store"])->name("service.store");
Route::get('/edit/services',[ServicesController::class,"edit"])->name("service.edit");
Route::post('/delete/services',[ServicesController::class,"delete"])->name("service.delete");


Route::get('/subservice',[SubServiceController::class,"index"])->name("sub.service.index");
Route::post('/subservice',[SubServiceController::class,"store"])->name("sub.service.store");
Route::get('/edit/subservice',[SubServiceController::class,"edit"])->name("sub.service.edit");
Route::post('/delete/subservice',[SubServiceController::class,"delete"])->name("sub.service.delete");
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
