<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserResponse;
use Illuminate\Support\Str;

class UserResponseController extends Controller
{
    public function store(Request $request)
    {
        $responses = $request->input('responses');
        $uniqueUrl = Str::uuid(); // Génére un UUID ( Universally unique identifier ) propre aux réponses d'un utilisateur 
        
        // Pour chacune des réponses
        foreach ($responses as $response) {
            // On récupère l'id de la question ainsi que son type
            $questionId = $response['questionId'];
            $type = $response['type'];

            // Un switch est placé afin de traiter les cas en fonction du type de question 
            // (Comme par type A sera une option plutot qu'un text)
            switch ($type) {
                // Cas A
                case 'A':
                    $responseOptionIds = $response['options'];
                    UserResponse::create([
                        'question_id' => $questionId,
                        'response_option_ids' => $responseOptionIds,
                        'unique_url' => $uniqueUrl,
                    ]);
                    break;

                // Cas B
                case 'B':
                    $responseText = $response['responseText'];
                    UserResponse::create([
                        'question_id' => $questionId,
                        'response_text' => $responseText,
                        'unique_url' => $uniqueUrl,
                    ]);
                    break;
                
                // Cas C
                case 'C':
                    $responseNumeric = $response['responseNumeric'];
                    UserResponse::create([
                        'question_id' => $questionId,
                        'response_numeric' => $responseNumeric,
                        'unique_url' => $uniqueUrl,
                    ]);
                    break;
            }
        }

        // Retourne un message de succès pour la réponse en attendant de traiter le reste
        return response()->json(['message' => 'Successfully registered answers', 'unique_url' => $uniqueUrl]);
    }

    public function viewResponses($uuid)
    {
        // Récupére les réponses associées à l'UUID depuis la base de données
        // On join la table des questions avec clé étrange 'question_id' pour sélectionner le title
        $responses = UserResponse::where('unique_url', $uuid)
        ->join('questions', 'user_responses.question_id', '=', 'questions.id')
        ->select('user_responses.*', 'questions.body as question_title')
        ->get();


        // Vérifie si des réponses ont été trouvées
        if ($responses->isEmpty()) {
            // Gére le cas où aucune réponse n'a été trouvée pour cet UUID (par exemple, affichez un message d'erreur)
            return view('responses.not_found');
        }

        // Renvoie les réponses à la vue appropriée pour les afficher
        return response()->json($responses);
    }

    public function getReponsesGroupedByUUID()
{
    // Récupére les réponses regroupées par UUID avec les informations de la question associée
    $reponsesGrouped = UserResponse::with('question')
        ->orderBy('unique_url')
        ->get()
        ->groupBy('unique_url');

    return response()->json($reponsesGrouped);
}



}
