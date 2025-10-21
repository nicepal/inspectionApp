<?php

namespace App\Http\Controllers;

use App\Models\Inspection;
use App\Models\Property;
use App\Models\Client;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $upcomingBookings = Inspection::where('company_id', auth()->user()->company_id)
            ->where('scheduled_date', '>=', now())
            ->with(['property', 'property.client'])
            ->orderBy('scheduled_date')
            ->get();

        $properties = Property::where('company_id', auth()->user()->company_id)
            ->orderBy('name')
            ->get();

        $clients = Client::where('company_id', auth()->user()->company_id)
            ->orderBy('name')
            ->get();

        return view('bookings', compact('upcomingBookings', 'properties', 'clients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'property_id' => 'required|exists:properties,id',
            'scheduled_date' => 'required|date|after:today',
            'scheduled_time' => 'required',
            'type' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $property = Property::findOrFail($validated['property_id']);

        if ($property->company_id != auth()->user()->company_id) {
            abort(403);
        }

        $scheduledDateTime = $validated['scheduled_date'] . ' ' . $validated['scheduled_time'];

        Inspection::create([
            'company_id' => auth()->user()->company_id,
            'property_id' => $validated['property_id'],
            'inspector_id' => auth()->id(),
            'scheduled_date' => $scheduledDateTime,
            'type' => $validated['type'],
            'status' => 'scheduled',
            'notes' => $validated['notes'],
            'inspection_number' => 'INS-' . strtoupper(uniqid()),
        ]);

        return redirect()->route('bookings.index')
            ->with('success', 'Booking created successfully');
    }
}
