<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        if (auth()->user()->isAdmin()) {
            $subscriptions = Subscription::with('company')->latest()->paginate(20);
        } else {
            $subscriptions = Subscription::where('company_id', auth()->user()->company_id)->latest()->paginate(20);
        }

        return view('subscriptions', compact('subscriptions'));
    }

    public function create()
    {
        return view('subscription-add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'plan_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'billing_cycle' => 'required|in:monthly,yearly',
            'status' => 'required|in:active,cancelled,expired,trial',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'max_users' => 'required|integer|min:1',
            'max_properties' => 'required|integer|min:1',
            'max_inspections_per_month' => 'required|integer|min:1',
        ]);

        $validated['company_id'] = auth()->user()->company_id;

        Subscription::create($validated);

        return redirect()->route('subscriptions.index')
            ->with('success', 'Subscription created successfully');
    }

    public function edit(Subscription $subscription)
    {
        if (!auth()->user()->isAdmin() && $subscription->company_id != auth()->user()->company_id) {
            abort(403);
        }

        return view('subscription-edit', compact('subscription'));
    }

    public function update(Request $request, Subscription $subscription)
    {
        if (!auth()->user()->isAdmin() && $subscription->company_id != auth()->user()->company_id) {
            abort(403);
        }

        $validated = $request->validate([
            'plan_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'billing_cycle' => 'required|in:monthly,yearly',
            'status' => 'required|in:active,cancelled,expired,trial',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'max_users' => 'required|integer|min:1',
            'max_properties' => 'required|integer|min:1',
            'max_inspections_per_month' => 'required|integer|min:1',
        ]);

        $subscription->update($validated);

        return redirect()->route('subscriptions.index')
            ->with('success', 'Subscription updated successfully');
    }

    public function destroy(Subscription $subscription)
    {
        if (!auth()->user()->isAdmin() && $subscription->company_id != auth()->user()->company_id) {
            abort(403);
        }

        $subscription->delete();

        return redirect()->route('subscriptions.index')
            ->with('success', 'Subscription deleted successfully');
    }
}
