<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserResponseController;

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

Route::view('/administration/dashboard', 'admin/dashboard');
Route::view('/administration/dashboard/{any}', 'admin/dashboard')
    ->where('any', '.*');

Route::view('/administration', 'admin/login')
    ->where('any', '.*');

Route::view('/administration/{any}', 'admin/login')
    ->where('any', '.*');

Route::view('/{any}', 'index')
    ->where('any', '.*');