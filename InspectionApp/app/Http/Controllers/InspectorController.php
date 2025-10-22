<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\InspectorAvailability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class InspectorController extends Controller
{
    public function index()
    {
        $inspectors = User::where('company_id', auth()->user()->company_id)
            ->whereIn('role', ['inspector', 'assessor', 'field_agent'])
            ->withCount('inspections')
            ->orderBy('name')
            ->get();

        return view('inspectors.index', compact('inspectors'));
    }

    public function create()
    {
        return view('inspectors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'nullable|string|max:20',
            'role' => 'required|in:inspector,assessor,field_agent',
            'password' => ['required', Rules\Password::defaults()],
            'status' => 'required|in:active,inactive',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'role' => $validated['role'],
            'password' => Hash::make($validated['password']),
            'status' => $validated['status'],
            'company_id' => auth()->user()->company_id,
        ]);

        return redirect()->route('inspectors.index')
            ->with('success', 'Inspector added successfully');
    }

    public function show(User $inspector)
    {
        if ($inspector->company_id !== auth()->user()->company_id) {
            abort(403);
        }

        $inspector->load('inspections.property');
        
        $recentInspections = $inspector->inspections()
            ->with('property')
            ->latest()
            ->take(10)
            ->get();

        $availability = InspectorAvailability::where('inspector_id', $inspector->id)
            ->where('date', '>=', now()->toDateString())
            ->orderBy('date')
            ->orderBy('start_time')
            ->take(30)
            ->get();

        return view('inspectors.show', compact('inspector', 'recentInspections', 'availability'));
    }

    public function edit(User $inspector)
    {
        if ($inspector->company_id !== auth()->user()->company_id) {
            abort(403);
        }

        return view('inspectors.edit', compact('inspector'));
    }

    public function update(Request $request, User $inspector)
    {
        if ($inspector->company_id !== auth()->user()->company_id) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $inspector->id,
            'phone' => 'nullable|string|max:20',
            'role' => 'required|in:inspector,assessor,field_agent',
            'status' => 'required|in:active,inactive',
        ]);

        $inspector->update($validated);

        if ($request->filled('password')) {
            $request->validate([
                'password' => ['required', Rules\Password::defaults()],
            ]);
            $inspector->update(['password' => Hash::make($request->password)]);
        }

        return redirect()->route('inspectors.index')
            ->with('success', 'Inspector updated successfully');
    }

    public function destroy(User $inspector)
    {
        if ($inspector->company_id !== auth()->user()->company_id) {
            abort(403);
        }

        $inspector->delete();

        return redirect()->route('inspectors.index')
            ->with('success', 'Inspector deleted successfully');
    }

    public function availability(User $inspector)
    {
        if ($inspector->company_id !== auth()->user()->company_id) {
            abort(403);
        }

        $availability = InspectorAvailability::where('inspector_id', $inspector->id)
            ->orderBy('date')
            ->orderBy('start_time')
            ->paginate(20);

        return view('inspectors.availability', compact('inspector', 'availability'));
    }

    public function storeAvailability(Request $request, User $inspector)
    {
        if ($inspector->company_id !== auth()->user()->company_id) {
            abort(403);
        }

        $validated = $request->validate([
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'status' => 'required|in:available,unavailable,busy',
            'type' => 'required|in:working_hours,time_off,booked',
            'notes' => 'nullable|string',
        ]);

        InspectorAvailability::create([
            'company_id' => auth()->user()->company_id,
            'inspector_id' => $inspector->id,
            'date' => $validated['date'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'status' => $validated['status'],
            'type' => $validated['type'],
            'notes' => $validated['notes'] ?? null,
        ]);

        return redirect()->route('inspectors.availability', $inspector)
            ->with('success', 'Availability added successfully');
    }
}
