<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResourcesController extends Controller
{
    /**
     * Display a listing of the resources.
     */
    public function index()
    {
        // This is a placeholder for now - will be replaced with actual resource model data
        $resources = [];
        
        return view('dashboard.resources.index', compact('resources'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.resources.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation placeholder
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'nullable|file|max:10240', // 10MB max
        ]);
        
        // Success message
        return redirect()->route('dashboard.resources.index')
                         ->with('success', 'Resource created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Placeholder
        return view('dashboard.resources.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Placeholder
        return view('dashboard.resources.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validation placeholder
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'nullable|file|max:10240', // 10MB max
        ]);
        
        // Success message
        return redirect()->route('dashboard.resources.index')
                         ->with('success', 'Resource updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Success message
        return redirect()->route('dashboard.resources.index')
                         ->with('success', 'Resource deleted successfully');
    }
    
    /**
     * Toggle the status of the specified resource.
     */
    public function toggleStatus(string $id)
    {
        // Success message
        return response()->json(['success' => true, 'message' => 'Status updated successfully']);
    }
}
