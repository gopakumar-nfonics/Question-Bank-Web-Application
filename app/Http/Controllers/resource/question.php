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
use App\Models\QuestionPaper;
use App\Models\QuestionPaperQuestion;
use App\Jobs\GenerateQuestionPapersJob;
use Illuminate\Support\Facades\Auth;

class question extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->isPapersetter()) {
        $questions = Questions::with(['subject', 'topic', 'correctAnswer','difficultylevel'])->where('created_by',Auth::id())->get();
        }else{
            $questions = Questions::with(['subject', 'topic', 'correctAnswer','difficultylevel', 'creator'])->get();
        }

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
        try {
            // Find the subject by ID
            $question = Questions::findOrFail($id);

            // Check if the subject is already soft-deleted
            if ($question) {

                $paperCount = QuestionPaperQuestion::where('qpq_question_id', $question->qs_id)->count();
                
                if ($paperCount > 0) {
                    return response()->json(['error' => 'Cannot delete question associated with a question paper.']);
                }

                $question->forceDelete();
                return response()->json(['success' => 'The Question has been deleted!']);
            }
    
          
        } catch (\Exception $e) {
            // Handle errors
            return response()->json(['success' => false, 'message' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }

    public function questionconfig()
    {

        $difficultyLevels = DifficultyLevel::all();
        $subjects = Subject::all();

        return view('question.qs_papper_config',compact('difficultyLevels','subjects'));

    }

    public function questionConfigEdit($id)
    {

        $difficultyLevels = DifficultyLevel::all();
       $subjects = Subject::all();
       $config = QuestionConfig::findOrFail($id);

       $templatedetails = QuestionConfiginfo::with(['subject', 'topic', 'difficultyLevel'])
    ->where('qd_template_id', $id)
    ->get();



        return view('question.qs_papper_config_edit',compact('difficultyLevels','subjects','config','templatedetails'));

    }

    public function storeQuestions(Request $request)
{
   
    $validated = $request->validate([
        'questions' => 'required|json',  // Ensure questions are passed as JSON
    ]);

    // Decode the JSON data for questions
    $questionsData = json_decode($request->input('questions'), true);

    
    // Store the QuestionConfig (the parent table)
    $questionConfig = QuestionConfig::create([
        'qt_title' => $questionsData[0]['paper_title'],  // All topics belong to the same subject
        'qt_no_of_questions' => $questionsData[0]['total_num_quetion'],
        'created_by' => Auth::id(),
    ]);

    // Store QuestionDetails (the child table) for each question data
    foreach ($questionsData as $question) {
        QuestionConfiginfo::create([
            'qd_template_id' => $questionConfig->id,
            'qd_subject_id' => $question['subject_id'],
            'qd_topic_id' => $question['topic_id'],
            'qd_difficulty_level' => $question['difficulty_level_id'],
            'qd_no_of_questions' => $question['no_of_questions'],
        ]);
    }

    
    return redirect()->route('question.configiration')->with('success', 'Question paper configuration saved successfully!');
}
public function questionConfigUpdate(Request $request, $id){

    
   
    $validated = $request->validate([
        'questions' => 'required|json',  // Ensure questions are passed as JSON
    ]);

    // Decode the JSON data for questions
    $questionsData = json_decode($request->input('questions'), true);

    $questionConfig = QuestionConfig::findOrFail($id);

    
    $questionConfig->update([
        'qt_title' => $questionsData[0]['paper_title'],
        'qt_no_of_questions' => $questionsData[0]['total_num_quetion'],
    ]);

    QuestionConfiginfo::where('qd_template_id', $questionConfig->id)->delete();

    foreach ($questionsData as $question) {
        QuestionConfiginfo::create([
            'qd_template_id' => $questionConfig->id,
            'qd_subject_id' => $question['subject_id'],
            'qd_topic_id' => $question['topic_id'],
            'qd_difficulty_level' => $question['difficulty_level_id'],
            'qd_no_of_questions' => $question['no_of_questions'],
        ]);
    }

    
    return redirect()->route('question.configiration')->with('success', 'Question paper configuration saved successfully!');


}

public function configirationlist()
    {
       

        $questionConfigs = QuestionConfig::with(['details.subject', 'details.topic'])
    ->get()
    ->map(function ($config) {
        return [
            'tid'=>$config->id,
            'qt_title' => $config->qt_title,
            'qt_no_of_questions' => $config->qt_no_of_questions,
            'subjects' => $config->details->groupBy('qd_subject_id')->map(function ($details, $subjectId) {
                return [
                    'subject_name' => $details->first()->subject->sub_name,
                    'topics' => $details->map(function ($detail) {
                        return $detail->topic->topic_name;
                    })->unique()->values()->toArray(),
                    'total_questions' => $details->sum('qd_no_of_questions'),
                ];
            })->values()->toArray(),
        ];
    });


        return view('question.configirations',compact('questionConfigs'));
    }

    public function qspgeneration()
    {
      
        $pappertemplate = QuestionConfig::all();

        $lastQuestionPaper = QuestionPaper::where('qp_code', 'LIKE', 'AMQP%')
        ->orderBy('created_at', 'desc')
        ->first();

    // Determine the next base code
    $nextCode = $lastQuestionPaper
        ? 'AMQP' . str_pad(((int)substr($lastQuestionPaper->qp_code, 4, 5)) + 1, 5, '0', STR_PAD_LEFT)
        : 'AMQP00001';
       

        return view('question.qs_paper_generate',compact('pappertemplate','nextCode'));

    }

    public function checkPaperTitleUnique(Request $request)
{
    $request->validate(['paper_title' => 'required|string']);

    $id = $request->input('tid');
    if ($id) {
    $isUnique = !QuestionConfig::where('qt_title', $request->input('paper_title'))->where('id', '!=', $id)->exists();
    }else{
    $isUnique = !QuestionConfig::where('qt_title', $request->input('paper_title'))->exists();   
    }

    return response()->json(['isUnique' => $isUnique]);
}

public function generateQuestionPaper(Request $request)
{
    // Validate input
    $request->validate([
        'qp_title' => 'required|string|max:255',
        'qp_code' => 'required|string|max:255',
        'qp_template' => 'required|exists:tbl_question_template,id',
        'qp_count' => 'required|integer|min:1',
    ]);

    // Dispatch the job to the queue

    $requestData = $request->all();
    $requestData['user_id'] = Auth::id();

    GenerateQuestionPapersJob::dispatch($requestData);

    //return back()->with('success', 'Question papers are being generated in the background.');
    return redirect()->route('question.questionpaper')->with('success', 'Question papers generated Successfully');
}

public function questionpaper()
    {
       
        //$questionpapper = QuestionPaper::all();
        $questionpapper = QuestionPaper::orderBy('qp_id', 'desc')->get();

    
        return view('question.questionpaper_list',compact('questionpapper'));
    }

    public function bulkDownload(Request $request)
    {
        $files = $request->input('files', []);

        if (empty($files)) {
            return response()->json(['success' => false, 'message' => 'No files selected.']);
        }

        $responseFiles = [];
        foreach ($files as $filename) {
            $filePath = storage_path('app/question_papers/' . $filename . '.docx');
            
            if (file_exists($filePath)) {
                $responseFiles[] = [
                    'url' => url('/download/question-paper/' . $filename . '.docx'),
                    'name' => $filename . '.docx'
                ];
            }
        }

        if (empty($responseFiles)) {
            return response()->json(['success' => false, 'message' => 'No valid files found.']);
        }

        return response()->json(['success' => true, 'files' => $responseFiles]);
    }

    public function deleteQuestionPaper(Request $request)
    {

        $questionPaper = QuestionPaper::findOrFail($request->input('qp_id'));

        $questionPaper->forceDelete(); 
        return response()->json(['success' => 'The QuestionPaper has been deleted!']);
        
    }


}
