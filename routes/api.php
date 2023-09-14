<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\UserResponseController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/


Route::get('/questions', [SurveyController::class, 'index']);

Route::post('/save-responses', [UserResponseController::class, 'store']);
Route::get('/view-responses/{uuid}', [UserResponseController::class, 'viewResponses']);
Route::post('login',[AuthController::class, 'login']);
Route::get('dashboard', [AuthController::class, 'dashboard'])
    ->middleware('auth:sanctum');
Route::get('/questions-list', [SurveyController::class, 'index'])
    ->middleware('auth:sanctum');
Route::get('/responses-list', [SurveyController::class, 'index'])
    ->middleware('auth:sanctum');

Route::get('/reponses-grouped', [UserResponseController::class, 'getReponsesGroupedByUUID'])
    ->middleware('auth:sanctum');
