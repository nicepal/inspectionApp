@extends('layout')

@section('title', $inspector->name . ' - Inspector Details')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">{{ $inspector->name }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('inspectors.index') }}">Inspectors</a></li>
                <li class="breadcrumb-item active">{{ $inspector->name }}</li>
            </ol>
        </nav>
    </div>
    <div>
        <a href="{{ route('inspectors.edit', $inspector) }}" class="btn btn-primary">
            <i class="bi bi-pencil"></i> Edit
        </a>
        <a href="{{ route('inspectors.availability', $inspector) }}" class="btn btn-info">
            <i class="bi bi-calendar-check"></i> Availability
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Inspector Information</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="text-muted small">Email</label>
                            <p class="mb-0">{{ $inspector->email }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="text-muted small">Phone</label>
                            <p class="mb-0">{{ $inspector->phone ?? 'Not provided' }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="text-muted small">Role</label>
                            <p class="mb-0">
                                <span class="badge bg-info">{{ ucfirst(str_replace('_', ' ', $inspector->role)) }}</span>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label class="text-muted small">Status</label>
                            <p class="mb-0">
                                <span class="badge {{ $inspector->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                                    {{ ucfirst($inspector->status) }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-white">
                <h5 class="mb-0">Recent Inspections</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Inspection #</th>
                                <th>Property</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentInspections as $inspection)
                            <tr>
                                <td>
                                    <a href="{{ route('inspections.show', $inspection) }}">
                                        {{ $inspection->inspection_number }}
                                    </a>
                                </td>
                                <td>{{ $inspection->property->name }}</td>
                                <td>{{ $inspection->scheduled_at->format('M d, Y') }}</td>
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
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">
                                    No inspections assigned yet
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="mb-0">Upcoming Availability</h5>
            </div>
            <div class="card-body">
                @forelse($availability->take(5) as $slot)
                <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                    <div>
                        <strong>{{ $slot->date->format('M d, Y') }}</strong><br>
                        <small class="text-muted">{{ $slot->start_time }} - {{ $slot->end_time }}</small>
                    </div>
                    <span class="badge 
                        @if($slot->status == 'available') bg-success
                        @elseif($slot->status == 'busy') bg-warning
                        @else bg-danger
                        @endif">
                        {{ ucfirst($slot->status) }}
                    </span>
                </div>
                @empty
                <p class="text-muted text-center py-3">No availability scheduled</p>
                @endforelse
                <a href="{{ route('inspectors.availability', $inspector) }}" class="btn btn-sm btn-outline-primary w-100 mt-2">
                    View All Availability
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
