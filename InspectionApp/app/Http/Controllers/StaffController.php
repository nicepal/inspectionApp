<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class StaffController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', User::class);

        $staff = User::where('company_id', auth()->user()->company_id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('staff.index', compact('staff'));
    }

    public function create()
    {
        $this->authorize('create', User::class);

        return view('staff.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', User::class);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'nullable|string|max:20',
            'role' => 'required|in:inspector,manager,staff',
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

        return redirect()->route('staff.index')
            ->with('success', 'Staff member added successfully');
    }

    public function show(User $staff)
    {
        $this->authorize('view', $staff);

        $recentInspections = $staff->inspections()
            ->with('property')
            ->latest()
            ->take(5)
            ->get();

        return view('staff.show', compact('staff', 'recentInspections'));
    }

    public function edit(User $staff)
    {
        $this->authorize('update', $staff);

        return view('staff.edit', compact('staff'));
    }

    public function update(Request $request, User $staff)
    {
        $this->authorize('update', $staff);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $staff->id,
            'phone' => 'nullable|string|max:20',
            'role' => 'required|in:inspector,manager,staff',
            'status' => 'required|in:active,inactive',
        ]);

        $staff->update($validated);

        if ($request->filled('password')) {
            $request->validate([
                'password' => ['required', Rules\Password::defaults()],
            ]);
            $staff->update(['password' => Hash::make($request->password)]);
        }

        return redirect()->route('staff.index')
            ->with('success', 'Staff member updated successfully');
    }

    public function destroy(User $staff)
    {
        $this->authorize('delete', $staff);

        $staff->delete();

        return redirect()->route('staff.index')
            ->with('success', 'Staff member deleted successfully');
    }
}
