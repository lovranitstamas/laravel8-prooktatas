<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

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

Route::get('/registration', [CustomerController::class, 'create'])->name('customer.create');
Route::post('/registration', [CustomerController::class, 'store'])->name('customer.store');
Route::get('/login', [CustomerAuthController::class, 'create'])->name('login.create');
Route::post('/login/store', [CustomerAuthController::class, 'store'])->name('login.store');

Route::middleware('admin_auth')->group(function () {
    Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/index', [DashboardController::class, 'index'])->name('index');
    });
});

Route::namespace('Auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.create');
    Route::post('/login', [LoginController::class, 'login'])->name('login.store');

    Route::middleware('admin_auth')->group(function () {
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    });
});

Route::middleware('customer_auth')->group(function () {
    Route::delete('/logout', [CustomerAuthController::class, 'destroy'])->name('login.destroy');

    Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/customer/{customerId}', [CustomerController::class, 'show'])->name('customer.show');
    Route::get('/customer/{customerId}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::put('/customer/{customerId}/edit', [CustomerController::class, 'update'])->name('customer.update');
    Route::delete('/customer/{customerId}/destroy', [CustomerController::class, 'destroy'])->name('customer.destroy');
    Route::delete('/customer/{customerId}/destroyWithJson', [CustomerController::class, 'destroyWithJson'])
        ->name('customer.destroyWithJson');

    Route::resource('note', NoteController::class);
});


/*Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/

/*
 *
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');
*/
