<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TemplateController extends Controller
{
    public function index()
    {
        $companyId = Auth::user()->company_id;
        $templates = Template::where(function($query) use ($companyId) {
            $query->where('company_id', $companyId)
                  ->orWhere('is_public', true);
        })
        ->latest()
        ->paginate(20);
        
        return view('report-templates', compact('templates'));
    }

    public function create()
    {
        return view('form-builder');
    }

    public function store(Request $request)
    {
        $companyId = Auth::user()->company_id;
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:fire_safety,structural,compliance,safety_audit,electrical,environmental',
            'description' => 'nullable|string',
            'fields' => 'required|array',
            'is_public' => 'nullable|boolean',
        ]);

        $validated['company_id'] = $companyId;
        $validated['created_by'] = Auth::id();
        $validated['is_public'] = $validated['is_public'] ?? false;
        
        $template = Template::create($validated);

        return redirect()->route('templates.show', $template)
            ->with('success', 'Template created successfully.');
    }

    public function show(Template $template)
    {
        $companyId = Auth::user()->company_id;
        
        if (!$template->is_public && $template->company_id !== $companyId) {
            abort(403);
        }
        
        $template->load(['creator', 'inspections']);
        return view('templates.show', compact('template'));
    }

    public function edit(Template $template)
    {
        if ($template->company_id !== Auth::user()->company_id) {
            abort(403);
        }
        
        return view('templates.edit', compact('template'));
    }

    public function update(Request $request, Template $template)
    {
        if ($template->company_id !== Auth::user()->company_id) {
            abort(403);
        }
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:fire_safety,structural,compliance,safety_audit,electrical,environmental',
            'description' => 'nullable|string',
            'fields' => 'required|array',
            'is_public' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
            'status' => 'nullable|in:active,archived,draft',
        ]);

        $template->update($validated);

        return redirect()->route('templates.show', $template)
            ->with('success', 'Template updated successfully.');
    }

    public function destroy(Template $template)
    {
        if ($template->company_id !== Auth::user()->company_id) {
            abort(403);
        }
        
        $template->delete();

        return redirect()->route('templates.index')
            ->with('success', 'Template deleted successfully.');
    }
}
