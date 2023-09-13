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

Route::get('/', function () {
    return view('index');
});

Route::get('/hello', function () {
    return view('index');
});

Route::get('/view-responses/{uuid}', function () {
    return view('index');
}); //vue à créer ensuite sur le blade d'index.


