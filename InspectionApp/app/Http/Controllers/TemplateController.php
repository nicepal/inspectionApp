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
        $templates = Template::where('company_id', $companyId)
            ->latest()
            ->paginate(20);
        
        return view('report-templates', compact('templates'));
    }

    public function templateCenter(Request $request)
    {
        $query = Template::where('is_public', true)->whereNull('company_id');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $templates = $query->latest('usage_count')->paginate(12)->withQueryString();
        
        return view('template-center', compact('templates'));
    }

    public function saveToMyTemplates(Template $template)
    {
        if (!$template->is_public || $template->company_id !== null) {
            abort(403, 'This template is not available in the Template Center');
        }

        $companyId = Auth::user()->company_id;

        $existing = Template::where('company_id', $companyId)
            ->where('name', $template->name)
            ->exists();

        if ($existing) {
            return redirect()->route('template-center.index')
                ->with('error', 'You already have a template with this name');
        }

        $newTemplate = Template::create([
            'company_id' => $companyId,
            'created_by' => Auth::id(),
            'name' => $template->name,
            'category' => $template->category,
            'description' => $template->description,
            'fields' => $template->fields,
            'is_public' => false,
            'is_active' => true,
            'status' => 'active',
        ]);

        $template->increment('usage_count');

        return redirect()->route('templates.index')
            ->with('success', 'Template saved to My Templates successfully');
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
