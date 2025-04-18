<?php

namespace App\Http\Controllers;

use App\Models\Objective;
use Illuminate\Http\Request;

class ObjectiveController extends Controller
{
    public function index()
    {
        $objectives = Objective::all();
        return response()->json($objectives);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $objective = Objective::create($validated);

        return redirect()->back()->with('success', 'Objective added successfully');
    }

    public function update(Request $request, Objective $objective)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $objective->update($validated);

        return redirect()->back()->with('success', 'Objective updated successfully');
    }

    public function destroy(Objective $objective)
    {
        // Check if objective is in use
        if ($objective->donations()->count() > 0) {
            return redirect()->back()->with('error', 'Cannot delete objective that has donations');
        }

        $objective->delete();

        return redirect()->back()->with('success', 'Objective deleted successfully');
    }
}
