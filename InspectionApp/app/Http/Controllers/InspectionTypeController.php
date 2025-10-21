<?php

namespace App\Http\Controllers;

use App\Models\InspectionType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InspectionTypeController extends Controller
{
    public function index()
    {
        $types = InspectionType::where(function($query) {
            $query->where('company_id', auth()->user()->company_id)
                  ->orWhere('is_system', true);
        })->orderBy('sort_order')->orderBy('name')->get();

        return view('inspection-types', compact('types'));
    }

    public function create()
    {
        return view('inspection-type-add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'color' => 'required|string|max:7',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0',
        ]);

        $validated['company_id'] = auth()->user()->company_id;
        $validated['is_active'] = $request->has('is_active');

        InspectionType::create($validated);

        return redirect()->route('inspection-types.index')
            ->with('success', 'Inspection type created successfully');
    }

    public function edit(InspectionType $inspectionType)
    {
        if ($inspectionType->is_system || 
            ($inspectionType->company_id && $inspectionType->company_id != auth()->user()->company_id)) {
            abort(403, 'Unauthorized action.');
        }

        return view('inspection-type-edit', compact('inspectionType'));
    }

    public function update(Request $request, InspectionType $inspectionType)
    {
        if ($inspectionType->is_system || 
            ($inspectionType->company_id && $inspectionType->company_id != auth()->user()->company_id)) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'color' => 'required|string|max:7',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $inspectionType->update($validated);

        return redirect()->route('inspection-types.index')
            ->with('success', 'Inspection type updated successfully');
    }

    public function destroy(InspectionType $inspectionType)
    {
        if ($inspectionType->is_system || 
            ($inspectionType->company_id && $inspectionType->company_id != auth()->user()->company_id)) {
            abort(403, 'Unauthorized action.');
        }

        $inspectionType->delete();

        return redirect()->route('inspection-types.index')
            ->with('success', 'Inspection type deleted successfully');
    }
}
