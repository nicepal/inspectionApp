<?php

namespace App\Http\Controllers;

use App\Models\Inspection;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ReportController extends Controller
{
    public function index()
    {
        $companyId = Auth::user()->company_id;
        $reports = Report::with(['inspection', 'generator'])
            ->where('company_id', $companyId)
            ->latest()
            ->paginate(20);
        
        return view('reports.index', compact('reports'));
    }

    public function create()
    {
        $companyId = Auth::user()->company_id;
        $inspections = Inspection::where('company_id', $companyId)
            ->where('status', 'completed')
            ->get();
        
        return view('reports.create', compact('inspections'));
    }

    public function store(Request $request)
    {
        $companyId = Auth::user()->company_id;
        
        $validated = $request->validate([
            'inspection_id' => ['required', Rule::exists('inspections', 'id')->where('company_id', $companyId)],
            'title' => 'required|string|max:255',
            'summary' => 'nullable|string',
            'sections' => 'nullable|array',
            'format' => 'nullable|in:pdf,html,docx',
        ]);

        $validated['company_id'] = $companyId;
        $validated['generated_by'] = Auth::id();
        $validated['report_number'] = 'RPT-' . strtoupper(uniqid());
        
        $report = Report::create($validated);

        return redirect()->route('reports.show', $report)
            ->with('success', 'Report created successfully.');
    }

    public function show(Report $report)
    {
        if ($report->company_id !== Auth::user()->company_id) {
            abort(403);
        }
        
        $report->load(['inspection', 'generator']);
        return view('reports.show', compact('report'));
    }

    public function edit(Report $report)
    {
        if ($report->company_id !== Auth::user()->company_id) {
            abort(403);
        }
        
        $companyId = Auth::user()->company_id;
        $inspections = Inspection::where('company_id', $companyId)
            ->where('status', 'completed')
            ->get();
        
        return view('reports.edit', compact('report', 'inspections'));
    }

    public function update(Request $request, Report $report)
    {
        if ($report->company_id !== Auth::user()->company_id) {
            abort(403);
        }
        
        $companyId = Auth::user()->company_id;
        
        $validated = $request->validate([
            'inspection_id' => ['required', Rule::exists('inspections', 'id')->where('company_id', $companyId)],
            'title' => 'required|string|max:255',
            'summary' => 'nullable|string',
            'sections' => 'nullable|array',
            'format' => 'nullable|in:pdf,html,docx',
            'status' => 'nullable|in:draft,pending,completed',
        ]);

        $report->update($validated);

        return redirect()->route('reports.show', $report)
            ->with('success', 'Report updated successfully.');
    }

    public function destroy(Report $report)
    {
        if ($report->company_id !== Auth::user()->company_id) {
            abort(403);
        }
        
        $report->delete();

        return redirect()->route('reports.index')
            ->with('success', 'Report deleted successfully.');
    }
}
