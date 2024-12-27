<?php

namespace App\Http\Controllers\resource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Subject;
use App\Models\Topic as topics; 

use Illuminate\Support\Facades\Auth;

class topic extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::with('topics')->get();
        return view('topic.index',compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects=Subject::orderBy('id')->get();
        return view('topic.create',['subjects'=>$subjects]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validate the input
    $validatedData = $request->validate([
        'topic_subject' => 'required|exists:tbl_subjects,id', // Ensures the subject exists
        'topic_name' => 'required|string', // Validate the tags as a string initially
    ], [
        'topic_subject.required' => 'Please select a subject.',
        'topic_subject.exists' => 'The selected subject is invalid.',
        'topic_name.required' => 'Please enter at least one topic.',
    ]);

    // Process the tags as an array
    $topics = json_decode($request->input('topic_name'), true);

    // Save each tag as a new row
    if (is_array($topics)) {
        foreach ($topics as $topic) {
            // Ensure 'value' key exists in the decoded array
            if (isset($topic['value'])) {
                topics::create([
                    'subject_id' => $request->input('topic_subject'), // Save the subject ID
                    'topic_name'  => ucfirst($topic['value']), // Save the topic name
                    'created_by' => Auth::id(),
                ]);
            }
        }
    } else {
        return redirect()->back()->withErrors(['topic_name' => 'Invalid topic format.']);
    }

   // return redirect()->back()->with('success', 'Topics saved successfully!');

   return redirect()->route('topic.index')->with('success', 'Topics Created Successfully');
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
        $topics = topics::where('subject_id', $id)->get();

        $subject_id = $id;

    // Transform the topics into a JSON format compatible with the tags input
    $tags = $topics->map(function ($topic) {
        return ['value' => $topic->topic_name];
    });

    $subjects=Subject::orderBy('id')->get();
        return view('topic.edit', compact('tags', 'subject_id', 'subjects'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Validate the input
    $validatedData = $request->validate([
        'topic_name' => 'required|string', // Ensure topic_name is a JSON string
    ], [
        'topic_name.required' => 'Please provide at least one topic.',
    ]);

    // Decode the JSON input
    $topics = json_decode($request->input('topic_name'), true);

    // Check if the JSON is valid
    if (is_array($topics)) {
        // Get existing topics for the subject
        $existingTopics = topics::where('subject_id', $id)->pluck('topic_name')->toArray();

        // Extract the names from the new input
        $newTopics = array_map(function ($topic) {
            return $topic['value'];
        }, $topics);

        // Determine topics to add
        $topicsToAdd = array_diff($newTopics, $existingTopics);

        // Determine topics to delete
        $topicsToDelete = array_diff($existingTopics, $newTopics);

        // Delete topics
        topics::where('subject_id', $id)
            ->whereIn('topic_name', $topicsToDelete)
            ->delete();

        // Add new topics
        foreach ($topicsToAdd as $topicName) {
            topics::create([
                'subject_id' => $id,
                'topic_name' => ucfirst($topicName),
                'created_by' => Auth::id(),
            ]);
        }
    } else {
        return redirect()->back()->withErrors(['topic_name' => 'Invalid topic format.']);
    }

    //return redirect()->back()->with('success', 'Topics updated successfully!');
    return redirect()->route('topic.index')->with('success', 'Topics updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
