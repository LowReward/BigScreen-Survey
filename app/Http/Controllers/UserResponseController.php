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
}
