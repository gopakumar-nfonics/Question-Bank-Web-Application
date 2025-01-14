<?php

namespace App\Http\Controllers\resource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User as userauthenticate;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class user extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentUserId = Auth::id();
        $users = userauthenticate::where('id', '!=', $currentUserId)->orderByDesc('id') ->get(); 
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:tbl_users',
            'role' => 'required',
            'password' => 'required|string|min:8',
        ]);
    
        try {
            $user = new userauthenticate();
            $user->	name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->role = $request->role;  
            $user->created_by = Auth::id();  
            $user->save();
    
            return redirect()->route('user.index')->with('success', 'User Created Successfully');
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
        $user = userauthenticate::find($id);
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:tbl_users,email,'.$id,
            'role' => 'required',
            'password' => 'nullable|string|min:8',
        ]);
    
        try {
           
            $user = userauthenticate::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            if($request->filled('password')){
            $user->password = bcrypt($request->password);
            }
            $user->role = $request->role;
             
            $user->save();
    
            return redirect()->route('user.index')->with('success', 'User Updated Successfully');
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
        //
    }

    public function deleteUser(Request $request)
    {

        $user = userauthenticate::findOrFail($request->input('id'));
        if (!$user) {
        return response()->json(['error' => 'User not found.'], 404);
        }
        $questioncount = Question::where('created_by', $request->input('id'))->count();
        if ($questioncount > 0) {
            return response()->json(['error' => 'Cannot delete this user because they are associated with questions.']);
        }
        $user->forceDelete(); 
        return response()->json(['success' => 'The user has been deleted!']);
        
    }
}
