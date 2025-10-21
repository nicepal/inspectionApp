<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Company;
use App\Models\Inspection;
use App\Models\Property;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $companyId = $user->company_id;

        $stats = [
            'total_properties' => Property::where('company_id', $companyId)->count(),
            'total_inspections' => Inspection::where('company_id', $companyId)->count(),
            'total_clients' => Client::where('company_id', $companyId)->count(),
            'pending_reports' => Report::where('company_id', $companyId)
                ->where('status', 'pending')
                ->count(),
        ];

        $upcomingInspections = Inspection::with(['property', 'client', 'inspector'])
            ->where('company_id', $companyId)
            ->where('status', 'scheduled')
            ->orderBy('scheduled_at', 'asc')
            ->limit(5)
            ->get();

        $recentActivity = Inspection::with(['property', 'inspector'])
            ->where('company_id', $companyId)
            ->latest()
            ->limit(5)
            ->get();

        return view('dashboard', compact('stats', 'upcomingInspections', 'recentActivity'));
    }
}
