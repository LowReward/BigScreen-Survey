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
    ];

    public function question()
    {
        return $this->belongsTo(Question::class); // Relation entre les réponses des utilisateurs et les réponses qui y sont associés.
    }
}
