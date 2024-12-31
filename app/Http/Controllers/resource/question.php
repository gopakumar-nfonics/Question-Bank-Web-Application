<?php

namespace App\Http\Controllers\resource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DifficultyLevel;
use App\Models\Subject;
use App\Models\Question as Questions;
use App\Models\QuestionOption;
use App\Models\QuestionConfig;
use App\Models\QuestionConfiginfo;
use Illuminate\Support\Facades\Auth;

class question extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Questions::with(['subject', 'topic', 'correctAnswer'])->get();

        return view('question.index',compact('questions'));
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
    ], [
        'question.required' => 'The question field is required.',
        'question.string' => 'The question must be a valid string.',
        'q_subject.exists' => 'The selected subject is invalid.',
        'q_topic.exists' => 'The selected topic is invalid.',
        'difficulty_level.exists' => 'The selected difficulty level is invalid.',
        'option1.required' => 'Option 1 is required.',
        'option2.required' => 'Option 2 is required.',
        'option3.required' => 'Option 3 is required.',
        'option4.required' => 'Option 4 is required.',
        'is_answer.required' => 'Please specify the correct answer.',
        'is_answer.string' => 'The correct answer must be a valid string.',
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

    public function questionconfig()
    {

        $difficultyLevels = DifficultyLevel::all();
        //$subjects = Subject::all();
        $addedSubjectIds = QuestionConfig::with('subject')
        ->pluck('qc_subject_id')
        ->toArray();

    // Fetch subjects that are not in the list of added subjects
    $subjects = Subject::whereNotIn('id', $addedSubjectIds)->get();

        return view('question.qs_papper_config',compact('difficultyLevels','subjects'));

    }

    public function storeQuestions(Request $request)
{
   
    $validated = $request->validate([
        'questions' => 'required|json',  // Ensure questions are passed as JSON
    ]);

    // Decode the JSON data for questions
    $questionsData = json_decode($request->input('questions'), true);

      // Get the Subject Code (Assuming subject code is stored in the subjects table)
      $subject = Subject::find($questionsData[0]['subject_id']); // Get subject based on the subject_id

      if (!$subject) {
          return redirect()->back()->with('error', 'Subject not found!');
      }
  
      // Generate the unique qc_code
      $subjectCode = $subject->sub_code; // Assuming `code` is a column in the subjects table
      $lastCode = QuestionConfig::where('qc_subject_id', $questionsData[0]['subject_id'])
          ->latest()
          ->first();
  
      $increment = 1;
      if ($lastCode) {
          // Extract the last number from the qc_code
          preg_match('/-(\d+)$/', $lastCode->qc_code, $matches);
          if (isset($matches[1])) {
              $increment = (int) $matches[1] + 1; 
          }
      }
  
      // Format the new qc_code
      $qcCode = 'AM-' . strtoupper($subjectCode) . '-' . str_pad($increment, 3, '0', STR_PAD_LEFT);
  

    // Store the QuestionConfig (the parent table)
    $questionConfig = QuestionConfig::create([
        'qc_subject_id' => $questionsData[0]['subject_id'],  // All topics belong to the same subject
        'qc_no_of_questions' => $questionsData[0]['total_num_quetion'],
        'created_by' => Auth::id(),
        'qc_code' => $qcCode,
    ]);

    // Store QuestionDetails (the child table) for each question data
    foreach ($questionsData as $question) {
        QuestionConfiginfo::create([
            'qi_config_id' => $questionConfig->id,
            'qi_topic_id' => $question['topic_id'],
            'qi_difficulty_level' => $question['difficulty_level_id'],
            'qi_no_of_questions' => $question['no_of_questions'],
        ]);
    }

    
    return redirect()->route('question.configiration')->with('success', 'Question paper configuration saved successfully!');
}

public function configirationlist()
    {
        $questionConfigs = QuestionConfig::with('subject:id,sub_name') 
            ->get();

        return view('question.configirations',compact('questionConfigs'));
    }

    public function qspgeneration()
    {

        $difficultyLevels = DifficultyLevel::all();
        //$subjects = Subject::all();
        $addedSubjectIds = QuestionConfig::with('subject')
        ->pluck('qc_subject_id')
        ->toArray();

    // Fetch subjects that are not in the list of added subjects
    $subjects = Subject::whereIn('id', $addedSubjectIds)->get();

        return view('question.qs_paper_generate',compact('difficultyLevels','subjects'));

    }

}
