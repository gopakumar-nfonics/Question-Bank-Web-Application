<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Topic;
use App\Models\Question;
use App\Models\QuestionConfig;
use App\Models\QuestionPaper;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $subjectCount   = Subject::count();
        $topicCount     = Topic::count();
        $questionCount  = Question::count();
        $templateCount  = QuestionConfig::count();
        $qpaperCount  = QuestionPaper::count();
        $topics = Topic::withCount('questions')
               ->orderBy('questions_count', 'desc')
               ->get();
        $templates = QuestionConfig::orderBy('qt_no_of_questions', 'desc')->get();
        return view('home',compact('subjectCount','topicCount','questionCount','templateCount','qpaperCount','topics','templates'));
    }
}
