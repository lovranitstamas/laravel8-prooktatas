<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PageController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [PageController::class, 'index'])->name('index');

Route::get('/customers', [CustomerController::class, 'index'])->name('customer.index');
Route::get('/registration', [CustomerController::class, 'create'])->name('customer.create');
Route::post('/registration', [CustomerController::class, 'store'])->name('customer.store');
Route::get('/customer/{customerId}', [CustomerController::class, 'show'])->name('customer.show');
Route::get('/customers/{customerId}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
Route::put('/customers/{customerId}/edit', [CustomerController::class, 'update'])->name('customer.update');
Route::delete('/customer/{customerId}/destroy', [CustomerController::class, 'destroy'])->name('customer.destroy');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
