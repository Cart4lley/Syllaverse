<?php

// File: app/Http/Controllers/Admin/MasterDataController.php
// Description: Handles SO and ILO management for Admin Master Data module (Syllaverse)

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentOutcome;
use App\Models\IntendedLearningOutcome;

class MasterDataController extends Controller
{
    // Show Master Data page
    public function index()
    {
        return view('admin.master-data.index', [
            'studentOutcomes' => StudentOutcome::all(),
            'intendedLearningOutcomes' => IntendedLearningOutcome::all(),
        ]);
    }

    // Store SO or ILO
    public function store(Request $request, $type)
    {
        $request->validate([
            'code' => 'required|string|max:10|unique:' . ($type === 'so' ? 'student_outcomes' : 'intended_learning_outcomes'),
            'description' => 'required|string'
        ]);

        if ($type === 'so') {
            StudentOutcome::create($request->only('code', 'description'));
        } elseif ($type === 'ilo') {
            IntendedLearningOutcome::create($request->only('code', 'description'));
        }

        return back()->with('success', strtoupper($type) . ' added successfully!');
    }

    // Update SO or ILO
    public function update(Request $request, $type, $id)
    {
        $request->validate([
            'code' => 'required|string|max:10',
            'description' => 'required|string'
        ]);

        $model = $type === 'so' ? StudentOutcome::findOrFail($id) : IntendedLearningOutcome::findOrFail($id);
        $model->update($request->only('code', 'description'));

        return back()->with('success', strtoupper($type) . ' updated successfully!');
    }

    // Delete SO or ILO
    public function destroy($type, $id)
    {
        $model = $type === 'so' ? StudentOutcome::findOrFail($id) : IntendedLearningOutcome::findOrFail($id);
        $model->delete();

        return back()->with('success', strtoupper($type) . ' deleted successfully!');
    }
}

