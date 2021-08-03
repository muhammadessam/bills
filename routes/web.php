<?php

use App\Http\Controllers\BillsController;
use App\Http\Controllers\UsersController;
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

Route::middleware(['auth:sanctum', 'verified'])->prefix('admin')->as('admin.')->group(function () {
    Route::get('dashboard', function () {
        return view('layouts.master');
    })->name('dashboard');
    Route::resource('bill', BillsController::class);
    Route::resource('user', UsersController::class);
});
