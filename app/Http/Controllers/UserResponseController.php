<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserResponse;

class UserResponseController extends Controller
{
    public function store(Request $request)
    {
        $responses = $request->input('responses');

        // Vous pouvez valider les données ici selon vos besoins

        foreach ($responses as $response) {
            $questionId = $response['questionId'];
            $type = $response['type'];

            switch ($type) {
                case 'A':
                    $responseOptionIds = $response['options'];
                    UserResponse::create([
                        'question_id' => $questionId,
                        'response_option_ids' => $responseOptionIds,
                    ]);
                    break;

                case 'B':
                    $responseText = $response['responseText'];
                    UserResponse::create([
                        'question_id' => $questionId,
                        'response_text' => $responseText,
                    ]);
                    break;

                case 'C':
                    $responseNumeric = $response['responseNumeric'];
                    UserResponse::create([
                        'question_id' => $questionId,
                        'response_numeric' => $responseNumeric,
                    ]);
                    break;

                // Ajoutez d'autres cas pour gérer d'autres types de questions si nécessaire

                default:
                    // Gestion d'un type de question non pris en charge
                    break;
            }
        }

        return response()->json(['message' => 'Réponses enregistrées avec succès']);
    }
}
