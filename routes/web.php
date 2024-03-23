<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\DashboardController@index')->name('dashboard.index');

// Route::get('/admin/create', 'App\Http\Controllers\MahasiswaController@create')->name('admin.create');
// Route::post('/admin/store', 'App\Http\Controllers\MahasiswaController@store')->name('admin.store');
// Route::get('/admin/edit/{id}', 'App\Http\Controllers\MahasiswaController@edit')->name('admin.edit');
// Route resoucrce mahasiswa controller
Route::resource('admin', 'App\Http\Controllers\MahasiswaController');
