@extends('layout')

@section('title', 'Dashboard - Inspection Management System')
@section('dashboard-active', 'active')

@section('content')
<div class="page-header">
    <h1 class="page-title">Dashboard</h1>
    <p class="text-muted">Welcome back, {{ Auth::user()->name }}!</p>
</div>

<!-- Stats Cards -->
<div class="row g-4 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="card stat-card primary">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Total Properties</h6>
                        <h2 class="mb-0">{{ $stats['total_properties'] }}</h2>
                    </div>
                    <div class="stat-icon bg-primary bg-opacity-10 text-primary">
                        <i class="bi bi-building"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card stat-card success">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Total Inspections</h6>
                        <h2 class="mb-0">{{ $stats['total_inspections'] }}</h2>
                    </div>
                    <div class="stat-icon bg-success bg-opacity-10 text-success">
                        <i class="bi bi-clipboard-check"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card stat-card warning">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Active Clients</h6>
                        <h2 class="mb-0">{{ $stats['total_clients'] }}</h2>
                    </div>
                    <div class="stat-icon bg-warning bg-opacity-10 text-warning">
                        <i class="bi bi-people"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card stat-card danger">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Pending Reports</h6>
                        <h2 class="mb-0">{{ $stats['pending_reports'] }}</h2>
                    </div>
                    <div class="stat-icon bg-danger bg-opacity-10 text-danger">
                        <i class="bi bi-file-earmark-text"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Upcoming Inspections -->
<div class="row g-4">
    <div class="col-xl-8">
        <div class="card">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Upcoming Inspections</h5>
                    <a href="{{ route('inspections.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
            </div>
            <div class="card-body p-0">
                @if($upcomingInspections->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Property</th>
                                <th>Client</th>
                                <th>Type</th>
                                <th>Scheduled Date</th>
                                <th>Inspector</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($upcomingInspections as $inspection)
                            <tr>
                                <td>
                                    <a href="{{ route('inspections.show', $inspection) }}" class="text-decoration-none">
                                        <strong>{{ $inspection->property->name }}</strong>
                                    </a>
                                </td>
                                <td>{{ $inspection->client->name }}</td>
                                <td>
                                    <span class="badge 
                                        @if($inspection->inspection_type == 'fire_safety') bg-danger
                                        @elseif($inspection->inspection_type == 'structural') bg-primary
                                        @elseif($inspection->inspection_type == 'electrical') bg-warning
                                        @else bg-secondary
                                        @endif">
                                        {{ ucfirst(str_replace('_', ' ', $inspection->inspection_type)) }}
                                    </span>
                                </td>
                                <td>{{ $inspection->scheduled_at->format('M d, Y h:i A') }}</td>
                                <td>{{ $inspection->inspector->name ?? 'Unassigned' }}</td>
                                <td>
                                    <span class="badge 
                                        @if($inspection->status == 'scheduled') bg-info
                                        @elseif($inspection->status == 'in_progress') bg-warning
                                        @elseif($inspection->status == 'completed') bg-success
                                        @else bg-secondary
                                        @endif">
                                        {{ ucfirst($inspection->status) }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-center py-5">
                    <i class="bi bi-calendar-x text-muted" style="font-size: 3rem;"></i>
                    <p class="text-muted mt-3">No upcoming inspections scheduled</p>
                    <a href="{{ route('inspections.create') }}" class="btn btn-primary">Schedule Inspection</a>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="col-xl-4">
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="mb-0">Recent Activity</h5>
            </div>
            <div class="card-body">
                @if($recentActivity->count() > 0)
                <div class="activity-feed">
                    @foreach($recentActivity as $activity)
                    <div class="activity-item mb-3 pb-3 border-bottom">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <div class="activity-icon 
                                    @if($activity->status == 'completed') bg-success
                                    @elseif($activity->status == 'in_progress') bg-warning
                                    @else bg-info
                                    @endif bg-opacity-10 rounded-circle p-2">
                                    <i class="bi bi-clipboard-check 
                                        @if($activity->status == 'completed') text-success
                                        @elseif($activity->status == 'in_progress') text-warning
                                        @else text-info
                                        @endif"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <p class="mb-1">
                                    <strong>{{ $activity->property->name }}</strong>
                                </p>
                                <small class="text-muted">
                                    {{ $activity->inspection_type }} inspection
                                    @if($activity->inspector)
                                    by {{ $activity->inspector->name }}
                                    @endif
                                </small>
                                <br>
                                <small class="text-muted">
                                    <i class="bi bi-clock"></i> {{ $activity->created_at->diffForHumans() }}
                                </small>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center py-4">
                    <i class="bi bi-inbox text-muted" style="font-size: 2rem;"></i>
                    <p class="text-muted mt-2 mb-0">No recent activity</p>
                </div>
                @endif
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="card mt-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('inspections.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Schedule Inspection
                    </a>
                    <a href="{{ route('properties.create') }}" class="btn btn-outline-primary">
                        <i class="bi bi-building-add"></i> Add Property
                    </a>
                    <a href="{{ route('clients.create') }}" class="btn btn-outline-primary">
                        <i class="bi bi-person-plus"></i> Add Client
                    </a>
                    <a href="{{ route('reports.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-file-earmark-text"></i> View Reports
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .stat-icon {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        font-size: 24px;
    }
    .activity-icon {
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
@endpush
