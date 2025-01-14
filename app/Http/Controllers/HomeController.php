<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Topic;
use App\Models\Question;
use App\Models\QuestionConfig;
use App\Models\QuestionPaper;
use App\Models\user;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::user()->isPapersetter()) {

            return redirect()->route('question.index');
        }else{

        
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

    public function profile()
    {
        $userId = Auth::user()->id;
        $user = User::where('id', $userId)->first();
       
        return view('profile', compact('user'));
    }

    public function profileupdate(Request $request){

        $id = Auth::user()->id;

        $request->validate([
            'fname' => 'required|string|max:255',
            'email' => 'required|string|email|unique:tbl_users,email,'.$id,
            'password' => 'nullable|string|min:8',
        ]);
        try{
           $user = User::findOrFail($id);
           $user->name = $request->fname;
           $user->email = $request->email;
           if($request->filled('password')){
           $user->password = bcrypt($request->password);
           }
           $user->save();

           return redirect()->route('dashboard')->with('success','Profile updated Successfully');
       } catch (\Exception $e) {
           return redirect()->back()->with('error', $e->getMessage());
       }
    }
}
