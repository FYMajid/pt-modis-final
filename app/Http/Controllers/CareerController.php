<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CareerController extends Controller
{
    /**
     * Display a listing of the careers.
     */
    public function index()
    {
        $careers = Career::orderBy('created_at', 'desc')->get();
        return view('admin.careers', compact('careers'));
    }

    /**
     * Store a newly created career in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'position' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'required|url',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $career = Career::create([
            'position' => $request->position,
            'description' => $request->description,
            'link' => $request->link,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Career opportunity created successfully',
            'career' => $career
        ]);
    }

    /**
     * Display the specified career.
     */
    public function show($id)
    {
        $career = Career::findOrFail($id);
        return response()->json([
            'success' => true,
            'career' => $career
        ]);
    }

    /**
     * Update the specified career in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'position' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'required|url',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $career = Career::findOrFail($id);
        
        $career->update([
            'position' => $request->position,
            'description' => $request->description,
            'link' => $request->link,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Career opportunity updated successfully',
            'career' => $career
        ]);
    }

    /**
     * Remove the specified career from storage.
     */
    public function destroy($id)
    {
        $career = Career::findOrFail($id);
        $career->delete();

        return response()->json([
            'success' => true,
            'message' => 'Career opportunity deleted successfully'
        ]);
    }
}