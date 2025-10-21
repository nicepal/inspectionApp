<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $company = $user->company;

        return view('settings', compact('user', 'company'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'company_email' => 'nullable|email|max:255',
            'company_phone' => 'nullable|string|max:20',
            'company_address' => 'nullable|string',
            'timezone' => 'nullable|string',
            'date_format' => 'nullable|string',
            'time_format' => 'nullable|string',
        ]);

        $company = auth()->user()->company;
        $company->update([
            'name' => $validated['company_name'],
            'email' => $validated['company_email'] ?? null,
            'phone' => $validated['company_phone'] ?? null,
            'address' => $validated['company_address'] ?? null,
        ]);

        return back()->with('success', 'Settings updated successfully');
    }
}
