<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Inertia\Inertia;

class QuizController extends Controller
{
    public function index(){

        $questions = Question::all();
        return Inertia::render('Quiz', [
            'questions' => $questions,
        ]);

    }
}
