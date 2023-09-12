<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserResponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'unique_url',
        'response_text',
        'response_numeric',
        'response_option_ids',
    ];

    protected $casts = [
        'response_option_ids' => 'json', // traitement de la réponse en json pour les types A
    ];

    public function question()
    {
        return $this->belongsTo(Question::class); // Relation entre les réponses des utilisateurs et les réponses qui y sont associés.
    }
}
