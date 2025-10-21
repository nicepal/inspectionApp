<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $companyId = Auth::user()->company_id;
        $query = Client::where('company_id', $companyId);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%");
            });
        }

        if ($request->filled('type')) {
            $query->where('client_type', $request->type);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $clients = $query->latest()->paginate(20)->withQueryString();
        
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $companyId = Auth::user()->company_id;
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'client_type' => 'required|in:individual,company,government',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'secondary_phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            'status' => 'nullable|in:active,inactive',
        ]);

        $validated['company_id'] = $companyId;
        $client = Client::create($validated);

        return redirect()->route('clients.show', $client)
            ->with('success', 'Client created successfully.');
    }

    public function show(Client $client)
    {
        if ($client->company_id !== Auth::user()->company_id) {
            abort(403);
        }
        
        $client->load(['properties', 'inspections']);
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        if ($client->company_id !== Auth::user()->company_id) {
            abort(403);
        }
        
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        if ($client->company_id !== Auth::user()->company_id) {
            abort(403);
        }
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'client_type' => 'required|in:individual,company,government',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'secondary_phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            'status' => 'nullable|in:active,inactive',
        ]);

        $client->update($validated);

        return redirect()->route('clients.show', $client)
            ->with('success', 'Client updated successfully.');
    }

    public function destroy(Client $client)
    {
        if ($client->company_id !== Auth::user()->company_id) {
            abort(403);
        }
        
        $client->delete();

        return redirect()->route('clients.index')
            ->with('success', 'Client deleted successfully.');
    }
}
