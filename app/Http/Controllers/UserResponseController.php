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
            // (Comme par type C sera un int plutot qu'un text)
            switch ($type) {
                // Cas A
                case 'A':
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

public function ResponsesCharts(Request $request)
{
    // Récupére les réponses pour les questions 6, 7, 10, 11, 12, 13, 14 et 15
    $question6Responses = UserResponse::where('question_id', 6)->get();
    $question7Responses = UserResponse::where('question_id', 7)->get();
    $question10Responses = UserResponse::where('question_id', 10)->get();
    $question11Responses = UserResponse::where('question_id', 11)->get();
    $question12Responses = UserResponse::where('question_id', 12)->get();
    $question13Responses = UserResponse::where('question_id', 13)->get();
    $question14Responses = UserResponse::where('question_id', 14)->get();
    $question15Responses = UserResponse::where('question_id', 15)->get();

    // Compte le nombre de réponses pour chaque option
    $question6Options = [
        'Occulus Rift/s' => $question6Responses->where('response_text', 'Occulus Rift/s')->count(),
        'HTC Vive' => $question6Responses->where('response_text', 'HTC Vive')->count(),
        'Windows Mixed Reality' => $question6Responses->where('response_text', 'Windows Mixed Reality')->count(),
        'PSVR' => $question6Responses->where('response_text', 'PSVR')->count()
    ];

    $question7Options = [
        'SteamVR' => $question7Responses->where('response_text', 'SteamVR')->count(),
        'Occulus store' => $question7Responses->where('response_text', 'Occulus store')->count(),
        'Viveport' => $question7Responses->where('response_text', 'Viveport')->count(),
        'Playstation VR' => $question7Responses->where('response_text', 'Playstation VR')->count(),
        'Google Play' => $question7Responses->where('response_text', 'Google Play')->count(),
        'Windows store' => $question7Responses->where('response_text', 'Windows store')->count(),
    ];

    $question10Options = [
        'regarder des émissions TV en direct' => $question10Responses->where('response_text', 'regarder des émissions TV en direct')->count(),
        'regarder des films' => $question10Responses->where('response_text', 'regarder des films')->count(),
        'jouer en solo' => $question10Responses->where('response_text', 'jouer en solo')->count(),
        'jouer en team' => $question10Responses->where('response_text', 'jouer en team')->count()
    ];
    
    // Retourne les données sous forme de réponse JSON
    return response()->json([
        'question6' => $question6Options,
        'question7' => $question7Options,
        'question10' => $question10Options,
        'quality' => [
            'question11' => [
                'average' => $question11Responses->avg('response_numeric'), // Par exemple, la moyenne des réponses numériques
            ],
            'question12' => [
                'average' => $question12Responses->avg('response_numeric'),
            ],
            'question13' => [
                'average' => $question13Responses->avg('response_numeric'),
            ],
            'question14' => [
                'average' => $question14Responses->avg('response_numeric'),
            ],
            'question15' => [
                'average' => $question15Responses->avg('response_numeric'),
            ],
        ],
    ]);
}


}
