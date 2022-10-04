<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return redirect()->route('login');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Profile Routes
Route::prefix('profile')->name('profile.')->middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'getProfile'])->name('detail');
    Route::post('/update', [HomeController::class, 'updateProfile'])->name('update');
    Route::post('/change-password', [HomeController::class, 'changePassword'])->name('change-password');
});

// Alert
Route::resource('alert', AlertController::class);
Route::resource('alertgroup', AlertGroupController::class);
// Route::get('/alertgroup', [App\Http\Controllers\AlertGroupController::class, 'index'])->name('index');


// Permissions
// Route::resource('chart', ChartController::class);
Route::get('/chart', [App\Http\Controllers\ChartController::class, 'index'])->name('index');
// Route::post('/chart/fetch_data', 'ChartController@fetch_data')->name('daterange.fetch_data');

//Ticket
Route::middleware('auth')->prefix('trx_ticket')->name('trx_ticket.')->group(function () {
    Route::get('/', [App\Http\Controllers\TicketController::class, 'index'])->name('index');
    Route::get('/show/{ticket}', [App\Http\Controllers\TicketController::class, 'show'])->name('show');
    Route::put('/update/{ticket}', [App\Http\Controllers\TicketController::class, 'update'])->name('update');
});

// Users 
Route::middleware('auth')->prefix('users')->name('users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::get('/export', [UserController::class, 'export'])->name('export');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');
    Route::put('/update/{user}', [UserController::class, 'update'])->name('update');
    Route::get('/delete/{user}', [UserController::class, 'delete'])->name('destroy');
    Route::get('/update/status/{user_id}/{status}', [UserController::class, 'updateStatus'])->name('status');
});

// Route::get('users/export/', [UsersController::class, 'export']);
