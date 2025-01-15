<?php

namespace App\Http\Controllers\resource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\DifficultyLevel;
use App\Models\Subject;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class report extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->isPapersetter()) {
            $questions = Question::with(['subject', 'topic', 'correctAnswer','difficultylevel'])->where('created_by',Auth::id())->get();
            }else{
                $questions = Question::with(['subject', 'topic', 'correctAnswer','difficultylevel', 'creator'])->get();
            }
         
            $subjects = Subject::all();
            $topics = Topic::all();
            $difficultyLevels = DifficultyLevel::all();
            $qpmanagers = User::all();

        return view('report.index',compact('questions','subjects', 'topics', 'difficultyLevels','qpmanagers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function fetchdata(Request $request)
    {
        if ($request->isMethod('post')) {
            $query = Question::with('subject', 'topic', 'difficultylevel', 'correctAnswer', 'creator');
    
            // Apply filters if provided
            if ($request->has('subject') && $request->subject != '') {
                $query->where('qs_subject_id', $request->subject);
            }
            if ($request->has('topic') && $request->topic != '') {
                $query->where('qs_topic_id', $request->topic);
            }
            if ($request->has('difficulty') && $request->difficulty != '') {
                $query->where('qs_difficulty_level', $request->difficulty);
            }
            if ($request->has('qp_managers') && $request->qp_managers != '') {
                $query->where('created_by', $request->qp_managers);
            }
            if ($request->has('used_status') && $request->used_status !== '') {
                if ($request->used_status == 'used') {
                    $query->where('qs_usage_count', '>', 0);  // ✅ Used questions
                } elseif ($request->used_status == 'notused') {
                    $query->where('qs_usage_count', '=', 0);  // ✅ Unused questions
                }
            }
            
    
            // Search functionality
            if (!empty($request->search['value'])) {
                $search = $request->search['value'];
                $query->where(function ($q) use ($search) {
                    $q->where('qs_question', 'like', "%{$search}%")
                      ->orWhereHas('subject', function ($q) use ($search) {
                          $q->where('sub_name', 'like', "%{$search}%");
                      })
                      ->orWhereHas('topic', function ($q) use ($search) {
                          $q->where('topic_name', 'like', "%{$search}%");
                      });
                });
            }

            $query->orderBy('qs_usage_count', 'desc');
    
            // Pagination logic
            $perPage = $request->get('length', 10);  // Rows per page
            $start = $request->get('start', 0);      // Offset
    
            $totalData = Question::count();           // Total records without filter
            $filteredData = $query->count();          // Total records after filter
    
            // Apply pagination
            $questions = $query->skip($start)->take($perPage)->get();
    
            // Prepare data
            $data = [];
            foreach ($questions as $index => $question) {
                $data[] = [
                    'DT_RowIndex' => $start + $index + 1,  // ✅ Correct row numbering
                    'formatted_question' => '
                        <div class="d-flex align-items-center">
                            <div class="d-flex justify-content-start flex-column">
                                <div class="fw-400 d-block fs-6 text-gray-800 fw-bold ">
                                    ' . ucfirst($question->qs_question) . '
                                </div>
                                <div class="fw-400 d-block fs-6 text-primary">
                                    ' . ucfirst(optional($question->correctAnswer)->qo_options) . '
                                </div>
                                <div class="fw-400 d-block text-muted mt-1 fw-bold fs-7">
                                    ' . (Auth::user()->isAdmin() ? '
                                        <i class="fa-solid fa-user fs-8 p-0 me-1"></i>
                                        ' . ucfirst(optional($question->creator)->name) . ' &nbsp;&nbsp;
                                    ' : '') . '
                                    <i class="fa-solid fa-calendar-days fs-8 p-0 me-1 ms-0"></i>
                                    ' . \Carbon\Carbon::parse($question->created_at)->format('d-M-Y') . '
                                    &nbsp;&nbsp;Used Count : ' . $question->qs_usage_count. '

                                </div>
                            </div>
                        </div>',
    
                    'subject_topic' => '
                        <div class="d-flex align-items-center">
                            <div class="d-flex justify-content-start flex-column">
                                <div class="fw-400 d-block fs-6 text-gray-800 fw-bold ">
                                    ' . ucfirst($question->subject->sub_name) . '
                                </div>
                                <div class="fw-400 d-block fs-6 text-muted ">
                                    ' . ucfirst($question->topic->topic_name) . '
                                </div>
                                <div class="fw-400 d-block fs-6">
                                    <span class="badge badge-light-' . $question->difficultylevel->difficulty_level_color . ' fs-7 ps-0">
                                        ' . ucfirst($question->difficultylevel->difficulty_level) . '
                                    </span>
                                </div>
                            </div>
                        </div>',
                ];
            }
    
            // Return JSON response
            return response()->json([
                'draw' => intval($request->draw),
                'recordsTotal' => $totalData,       // Total without filter
                'recordsFiltered' => $filteredData, // Total after filter
                'data' => $data                     // Formatted data
            ]);
        }
    }
    

}
