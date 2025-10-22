<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Inspection;
use App\Models\InspectorAvailability;
use App\Models\Property;
use App\Models\Template;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class InspectionController extends Controller
{
    public function index()
    {
        $companyId = Auth::user()->company_id;
        $inspections = Inspection::with(['property', 'client', 'inspector'])
            ->where('company_id', $companyId)
            ->latest()
            ->paginate(20);
        
        return view('inspections', compact('inspections'));
    }

    public function create()
    {
        $companyId = Auth::user()->company_id;
        $properties = Property::where('company_id', $companyId)->get();
        $clients = Client::where('company_id', $companyId)->get();
        $inspectors = User::where('company_id', $companyId)
            ->whereIn('role', ['assessor', 'field_agent', 'manager'])
            ->get();
        $templates = Template::where(function($query) use ($companyId) {
            $query->where('company_id', $companyId)
                  ->orWhere('is_public', true);
        })->get();
        
        return view('inspection-schedule', compact('properties', 'clients', 'inspectors', 'templates'));
    }

    public function store(Request $request)
    {
        $companyId = Auth::user()->company_id;
        
        $validated = $request->validate([
            'property_id' => ['required', Rule::exists('properties', 'id')->where('company_id', $companyId)],
            'client_id' => ['required', Rule::exists('clients', 'id')->where('company_id', $companyId)],
            'inspector_id' => ['nullable', Rule::exists('users', 'id')->where('company_id', $companyId)],
            'template_id' => ['nullable', Rule::exists('templates', 'id')->where(function($query) use ($companyId) {
                $query->where('company_id', $companyId)->orWhere('is_public', true);
            })],
            'inspection_type' => 'required|in:fire_safety,structural,compliance,safety_audit,electrical',
            'scheduled_at' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        $validated['company_id'] = $companyId;
        $validated['inspection_number'] = 'INS-' . strtoupper(uniqid());
        
        $inspection = Inspection::create($validated);

        return redirect()->route('inspections.show', $inspection)
            ->with('success', 'Inspection scheduled successfully.');
    }

    public function show(Inspection $inspection)
    {
        if ($inspection->company_id !== Auth::user()->company_id) {
            abort(403);
        }
        
        $inspection->load(['property', 'client', 'inspector', 'template', 'reports']);
        return view('inspection-details', compact('inspection'));
    }

    public function edit(Inspection $inspection)
    {
        if ($inspection->company_id !== Auth::user()->company_id) {
            abort(403);
        }
        
        $companyId = Auth::user()->company_id;
        $properties = Property::where('company_id', $companyId)->get();
        $clients = Client::where('company_id', $companyId)->get();
        $inspectors = User::where('company_id', $companyId)
            ->whereIn('role', ['assessor', 'field_agent', 'manager'])
            ->get();
        $templates = Template::where(function($query) use ($companyId) {
            $query->where('company_id', $companyId)
                  ->orWhere('is_public', true);
        })->get();
        
        return view('inspections.edit', compact('inspection', 'properties', 'clients', 'inspectors', 'templates'));
    }

    public function update(Request $request, Inspection $inspection)
    {
        if ($inspection->company_id !== Auth::user()->company_id) {
            abort(403);
        }
        
        $companyId = Auth::user()->company_id;
        
        $validated = $request->validate([
            'property_id' => ['required', Rule::exists('properties', 'id')->where('company_id', $companyId)],
            'client_id' => ['required', Rule::exists('clients', 'id')->where('company_id', $companyId)],
            'inspector_id' => ['nullable', Rule::exists('users', 'id')->where('company_id', $companyId)],
            'template_id' => ['nullable', Rule::exists('templates', 'id')->where(function($query) use ($companyId) {
                $query->where('company_id', $companyId)->orWhere('is_public', true);
            })],
            'inspection_type' => 'required|in:fire_safety,structural,compliance,safety_audit,electrical',
            'scheduled_at' => 'required|date',
            'completed_at' => 'nullable|date',
            'status' => 'nullable|in:scheduled,in_progress,completed,cancelled',
            'result' => 'nullable|in:pass,fail,conditional,pending',
            'notes' => 'nullable|string',
            'score' => 'nullable|numeric|min:0|max:100',
        ]);

        $inspection->update($validated);

        return redirect()->route('inspections.show', $inspection)
            ->with('success', 'Inspection updated successfully.');
    }

    public function destroy(Inspection $inspection)
    {
        if ($inspection->company_id !== Auth::user()->company_id) {
            abort(403);
        }
        
        $inspection->delete();

        return redirect()->route('inspections.index')
            ->with('success', 'Inspection deleted successfully.');
    }
}
