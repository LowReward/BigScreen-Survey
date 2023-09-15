<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;

class SurveyController extends Controller
{
    // Méthode pour afficher toutes les questions du sondage
    public function index()
    {
        // Récupère toutes les questions depuis la base de données
        $questions = Question::all();

        // Retourne les questions au format JSON
        return response()->json($questions);
    }
}
