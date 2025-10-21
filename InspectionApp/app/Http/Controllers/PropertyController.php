<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PropertyController extends Controller
{
    public function index()
    {
        $companyId = Auth::user()->company_id;
        $properties = Property::with(['client'])
            ->where('company_id', $companyId)
            ->latest()
            ->paginate(20);
        
        return view('properties', compact('properties'));
    }

    public function create()
    {
        $companyId = Auth::user()->company_id;
        $clients = Client::where('company_id', $companyId)->get();
        return view('property-add', compact('clients'));
    }

    public function store(Request $request)
    {
        $companyId = Auth::user()->company_id;
        
        $validated = $request->validate([
            'client_id' => ['required', Rule::exists('clients', 'id')->where('company_id', $companyId)],
            'name' => 'required|string|max:255',
            'property_type' => 'nullable|in:residential,commercial,industrial',
            'address' => 'required|string',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'year_built' => 'nullable|integer|min:1800|max:' . (date('Y') + 1),
            'square_footage' => 'nullable|numeric|min:0',
            'floors' => 'nullable|integer|min:1',
            'description' => 'nullable|string',
        ]);

        $validated['company_id'] = $companyId;
        $property = Property::create($validated);

        return redirect()->route('properties.show', $property)
            ->with('success', 'Property created successfully.');
    }

    public function show(Property $property)
    {
        if ($property->company_id !== Auth::user()->company_id) {
            abort(403);
        }
        
        $property->load(['client', 'inspections']);
        return view('property-details', compact('property'));
    }

    public function edit(Property $property)
    {
        if ($property->company_id !== Auth::user()->company_id) {
            abort(403);
        }
        
        $companyId = Auth::user()->company_id;
        $clients = Client::where('company_id', $companyId)->get();
        return view('properties.edit', compact('property', 'clients'));
    }

    public function update(Request $request, Property $property)
    {
        if ($property->company_id !== Auth::user()->company_id) {
            abort(403);
        }
        
        $companyId = Auth::user()->company_id;
        
        $validated = $request->validate([
            'client_id' => ['required', Rule::exists('clients', 'id')->where('company_id', $companyId)],
            'name' => 'required|string|max:255',
            'property_type' => 'nullable|in:residential,commercial,industrial',
            'address' => 'required|string',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'year_built' => 'nullable|integer|min:1800|max:' . (date('Y') + 1),
            'square_footage' => 'nullable|numeric|min:0',
            'floors' => 'nullable|integer|min:1',
            'description' => 'nullable|string',
            'status' => 'nullable|in:active,inactive',
        ]);

        $property->update($validated);

        return redirect()->route('properties.show', $property)
            ->with('success', 'Property updated successfully.');
    }

    public function destroy(Property $property)
    {
        if ($property->company_id !== Auth::user()->company_id) {
            abort(403);
        }
        
        $property->delete();

        return redirect()->route('properties.index')
            ->with('success', 'Property deleted successfully.');
    }
}
