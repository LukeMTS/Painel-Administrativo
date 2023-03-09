<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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

// Route::get('/', function () {
//     return view('dashboard');
// });


Route::get('/home', [DashboardController::class, 'index']);


Route::middleware(['auth'])->group(function () {
    Route::get('/customer/register', [CustomerController::class, 'register'])->name('customer.register');
    Route::get('/album/register', [AlbumController::class, 'register'])->name('album.register');
    Route::get('/user/register', [UserController::class, 'register'])->name('user.register');

    Route::post('/customer/insert', [CustomerController::class, 'insert'])->name('customer.insert');
    Route::post('/album/insert', [AlbumController::class, 'insert'])->name('album.insert');
    Route::post('/user/insert', [UserController::class, 'insert'])->name('user.insert');

    Route::get('/album', [AlbumController::class, 'index'])->name('album.index');
    Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');

    Route::get('/customer/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');

    Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
});

Route::post('/login', [UserController::class, 'login'])->name('user.login');
Route::get('/login', [UserController::class, 'loginView'])->name('user.loginView');