<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        if ($user->isAdmin()) {
            $companies = Company::latest()->paginate(20);
        } else {
            $companies = Company::where('id', $user->company_id)->paginate(20);
        }
        
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        $this->authorize('create', Company::class);
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Company::class);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'industry_type' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
            'description' => 'nullable|string',
            'subscription_plan' => 'nullable|in:pay_as_you_go,monthly,annual,enterprise',
        ]);

        $company = Company::create($validated);

        return redirect()->route('companies.show', $company)
            ->with('success', 'Company created successfully.');
    }

    public function show(Company $company)
    {
        $this->authorize('view', $company);
        $company->load(['users', 'clients', 'properties', 'inspections']);
        return view('companies.show', compact('company'));
    }

    public function edit(Company $company)
    {
        $this->authorize('update', $company);
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        $this->authorize('update', $company);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'industry_type' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|in:active,archived',
            'subscription_plan' => 'nullable|in:pay_as_you_go,monthly,annual,enterprise',
        ]);

        $company->update($validated);

        return redirect()->route('companies.show', $company)
            ->with('success', 'Company updated successfully.');
    }

    public function destroy(Company $company)
    {
        $this->authorize('delete', $company);
        $company->delete();

        return redirect()->route('companies.index')
            ->with('success', 'Company deleted successfully.');
    }
}
