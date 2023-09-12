<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    
    protected $fillable = ['title', 'body', 'type', 'options'];

    protected $casts = [
        'options' => 'json', // traitement de la réponse en json pour les types A
    ];

}