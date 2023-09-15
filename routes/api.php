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

// Route pour obtenir la liste des questions
Route::get('/questions', [SurveyController::class, 'index']);

// Route pour stocker les réponses envoyées par le questionnaire
Route::post('/save-responses', [UserResponseController::class, 'store']);

// Route pour renvoyer les réponses d'un utilisateur selon son uuid
Route::get('/view-responses/{uuid}', [UserResponseController::class, 'viewResponses']);

// Route pour la connexion
Route::post('login',[AuthController::class, 'login']);


// Routes nécessitantes d'être authentifié
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('dashboard', [AuthController::class, 'dashboard']);
    Route::get('/questions-list', [SurveyController::class, 'index']);
    Route::get('/responses-list', [SurveyController::class, 'index']);
    Route::get('/reponses-grouped', [UserResponseController::class, 'getReponsesGroupedByUUID']);
    Route::get('/responses-charts', [UserResponseController::class, 'ResponsesCharts']);
});

