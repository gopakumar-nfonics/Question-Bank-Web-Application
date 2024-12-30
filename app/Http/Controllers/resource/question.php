<?php

namespace App\Http\Controllers\resource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DifficultyLevel;
use App\Models\Subject;
use App\Models\Question as Questions;
use App\Models\QuestionOption;
use Illuminate\Support\Facades\Auth;

class question extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $difficultyLevels = DifficultyLevel::all();
        $subjects = Subject::all();
        return view('question.create',compact('difficultyLevels','subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

       // print_r($request->is_answer);exit();
        $request->validate([
            'question' => 'required|string',
            'q_subject' => 'nullable|exists:tbl_subjects,id',
            'q_topic' => 'nullable|exists:tbl_topics,topic_id',
            'difficulty_level' => 'nullable|exists:tbl_difficulty_level,id',
            'option1' => 'required|string',
            'option2' => 'required|string',
            'option3' => 'required|string',
            'option4' => 'required|string',
            'is_answer' => 'required|string',
            
        ]);

        try {

            $questionModel = new Questions();
                $questionModel->qs_question = $request->question;
                $questionModel->qs_difficulty_level = $request->difficulty_level;
                $questionModel->qs_subject_id = $request->q_subject;
                $questionModel->qs_topic_id = $request->q_topic;
                $questionModel->created_by = Auth::id();
                $questionModel->save();

                $questionOptionModel1 = new QuestionOption();
                $questionOptionModel1->qo_question_id = $questionModel->qs_id;
                $questionOptionModel1->qo_options = $request->option1;
                $questionOptionModel1->qo_created_by = Auth::id();
                $questionOptionModel1->save();

                $questionOptionModel2 = new QuestionOption();
                $questionOptionModel2->qo_question_id = $questionModel->qs_id;
                $questionOptionModel2->qo_options =$request->option2;
                $questionOptionModel2->qo_created_by = Auth::id();
                $questionOptionModel2->save();

                $questionOptionModel3 = new QuestionOption();
                $questionOptionModel3->qo_question_id = $questionModel->qs_id;
                $questionOptionModel3->qo_options = $request->option3;
                $questionOptionModel3->qo_created_by = Auth::id();
                $questionOptionModel3->save();

                $questionOptionModel4 = new QuestionOption();
                $questionOptionModel4->qo_question_id = $questionModel->qs_id;
                $questionOptionModel4->qo_options = $request->option4;
                $questionOptionModel4->qo_created_by = Auth::id();
                $questionOptionModel4->save();

                $questionAnswer = $request->is_answer;

                switch($questionAnswer){
                    case '1':
                        $questionModel->qs_answer = $questionOptionModel1->qo_id;
                        break;
                    case '2':
                       // echo $questionOptionModel2->id;exit();
                        $questionModel->qs_answer = $questionOptionModel2->qo_id;
                        break;
                    case '3':
                        $questionModel->qs_answer = $questionOptionModel3->qo_id;
                        break;
                    case '4':
                        $questionModel->qs_answer = $questionOptionModel4->qo_id;
                        break;
                    default:
                        $questionModel->qs_answer = $questionOptionModel1->qo_id;
                        break;
                }
                $questionModel->save();
            
    
            return redirect()->route('question.index')->with('success', 'Question Created Successfully');
        } catch (\Exception $e) {
            

            print_r($e->getMessage());exit();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function qspapper()
    {

        $difficultyLevels = DifficultyLevel::all();
        $subjects = Subject::all();
        return view('question.qs_papper',compact('difficultyLevels','subjects'));

    }
}
