<?php

namespace App\Http\Controllers\resource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Subject as subjects;
use Illuminate\Support\Facades\Auth;

class subject extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects=subjects::orderBy('id')->get();
        return view('subject.index',['subjects'=>$subjects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subject.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'sub_name' => 'required|unique:tbl_subjects,sub_name',
            'sub_code' => 'required|unique:tbl_subjects,sub_code',
        ]);
    
            try {
                $subject = new subjects();
                $subject->sub_name = ucfirst($request->sub_name);   
                $subject->sub_code = $request->sub_code;
                $subject->created_by  = Auth::id();
                $subject->sub_remarks  = $request->remarks;    
                $subject->save();
        
                return redirect()->route('subject.index')->with('success', 'Subject Created Successfully');
            } catch (\Exception $e) {
                // Log the exception message
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
        $subject = subjects::find($id);
        return view('subject.edit',compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'sub_name' => 'required|unique:tbl_subjects,sub_name,'.$id,
            'sub_code' => 'required|unique:tbl_subjects,sub_code,'.$id,
        ]);
    
            try {
                $subject = subjects::findOrFail($id);
                $subject->sub_name = ucfirst($request->sub_name);
                $subject->sub_code = $request->sub_code;
                $subject->sub_remarks  = $request->remarks;       
                $subject->save();
        
                return redirect()->route('subject.index')->with('success', 'Subject Updated Successfully');
            } catch (\Exception $e) {
                // Log the exception message
                return redirect()->back()->with('error', $e->getMessage());
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Find the subject by ID
            $subject = subjects::findOrFail($id);
    
            // Check if the subject is already soft-deleted
            if ($subject) {
                // Permanently delete the subject
                $subject->forceDelete();
                return response()->json(['success' => 'The Subject has been deleted!']);
            }
    
          
        } catch (\Exception $e) {
            // Handle errors
            return response()->json(['success' => false, 'message' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }
}
