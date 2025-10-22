<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\InspectorAvailability;
use Illuminate\Http\Request;
use Carbon\Carbon;

class InspectorAvailabilityController extends Controller
{
    public function getAvailableInspectors(Request $request)
    {
        $date = $request->input('date');
        $time = $request->input('time');
        $companyId = auth()->user()->company_id;

        if (!$date || !$time) {
            return response()->json([
                'inspectors' => User::where('company_id', $companyId)
                    ->whereIn('role', ['inspector', 'assessor', 'field_agent'])
                    ->where('status', 'active')
                    ->select('id', 'name', 'role')
                    ->get()
            ]);
        }

        $datetime = Carbon::parse($date . ' ' . $time);
        $dateOnly = $datetime->toDateString();
        $timeOnly = $datetime->format('H:i:s');

        // Get inspectors who are available at this datetime
        $availableInspectorIds = InspectorAvailability::where('company_id', $companyId)
            ->where('date', $dateOnly)
            ->where('status', 'available')
            ->where('start_time', '<=', $timeOnly)
            ->where('end_time', '>=', $timeOnly)
            ->pluck('inspector_id')
            ->toArray();

        // Get all active inspectors with availability info
        $inspectors = User::where('company_id', $companyId)
            ->whereIn('role', ['inspector', 'assessor', 'field_agent'])
            ->where('status', 'active')
            ->select('id', 'name', 'role')
            ->get()
            ->map(function($inspector) use ($availableInspectorIds) {
                $inspector->is_available = in_array($inspector->id, $availableInspectorIds);
                return $inspector;
            });

        return response()->json([
            'inspectors' => $inspectors,
            'date' => $dateOnly,
            'time' => $timeOnly
        ]);
    }
}
