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

//auth route for both 
Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

// para users
Route::group(['middleware' => ['auth', 'role:user']], function() { 
    Route::get('/dashboard/notificacoes', 'App\Http\Controllers\DashboardController@notificacoes')->name('dashboard.notificacoes');
});

Route::group(['middleware' => ['auth', 'role:admin']], function() { 
    Route::get('/dashboard/envnotificacoes', 'App\Http\Controllers\DashboardController@envnotificacoes')->name('dashboard.envnotificacoes');
});

Route::group(['middleware' => ['auth', 'role:admin']], function() { 
    Route::get('/dashboard/registrar', 'App\Http\Controllers\Auth\RegisteredUserController@create')->name('dashboard.registrar');
});

Route::get('/dashboard/registrando', 'App\Http\Controllers\Auth\RegisteredUserController@store')->name('dashboard.registrando');


require __DIR__.'/auth.php';
