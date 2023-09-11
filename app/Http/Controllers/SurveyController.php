<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;

class SurveyController extends Controller
{
    public function index()
{
    $questions = Question::all();
    return response()->json($questions);
}

}
