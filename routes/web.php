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
    return view('loan_calculator');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('/users', \App\Http\Controllers\UserController::class);
Route::resource('/loans', \App\Http\Controllers\LoanController::class);
Route::post('/toggle_user_status', ['App\Http\Controllers\UserController', 'toggle_user_status'])->name('toggle_user_status');
Route::post('/toggle_loan_status', ['App\Http\Controllers\LoanController', 'toggle_loan_status'])->name('toggle_loan_status');

