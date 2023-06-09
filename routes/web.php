<?php

use Illuminate\Support\Facades\Route;
use app\Https\Controllers\EmpleadoController;
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
    return view('auth.login');
});

//   Route::get('/empleado', function (){
//      return view('empleado.index');
//   });

// Route::get('/empleado/create', 'App\Http\Controllers\EmpleadoController@create');

Route::resource('/empleado','App\Http\Controllers\EmpleadoController')->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\EmpleadoController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [App\Http\Controllers\EmpleadoController::class, 'index'])->name('home');


});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
