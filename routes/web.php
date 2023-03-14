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


// Route::get('/home', [DashboardController::class, 'index']);
Route::get('/', [UserController::class, 'loginView']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::middleware(['auth'])->group(function () {
    Route::get('/home', [CustomerController::class, 'home'])->name('home');

    //cadastros
    Route::get('/customer/register', [CustomerController::class, 'register'])->name('customer.register');
    Route::get('/album/register', [AlbumController::class, 'register'])->name('album.register');
    Route::get('/user/register', [UserController::class, 'register'])->name('user.register');

    //store
    Route::post('/customer/insert', [CustomerController::class, 'insert'])->name('customer.insert');
    Route::post('/album/insert', [AlbumController::class, 'insert'])->name('album.insert');
    Route::post('/user/insert', [UserController::class, 'insert'])->name('user.insert');

    Route::get('/album', [AlbumController::class, 'index'])->name('album.index');
    Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');

    Route::get('/customer/{customer}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::get('/album/{album}/edit', [AlbumController::class, 'edit'])->name('album.edit');

    //update
    Route::put('/customer/{customer}', [CustomerController::class, 'update'])->name('customer.update');
    Route::put('/album/{album}', [AlbumController::class, 'update'])->name('album.update');

    Route::get('/customer/{customer}/delete', [CustomerController::class, 'destroy'])->name('customer.destroy');
    Route::get('/album/{album}/delete', [AlbumController::class, 'destroy'])->name('album.destroy');

    Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
    Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');
});

Route::post('/login', [UserController::class, 'login'])->name('user.login');
Route::get('/login', [UserController::class, 'loginView'])->name('user.loginView');