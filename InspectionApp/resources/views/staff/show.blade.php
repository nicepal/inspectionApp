@extends('layout')

@section('title', 'Staff Details - Inspection Management System')
@section('staff-active', 'active')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Staff Details</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('staff.index') }}">Staff</a></li>
                <li class="breadcrumb-item active">{{ $staff->name }}</li>
            </ol>
        </nav>
    </div>
    <div>
        <a href="{{ route('staff.edit', $staff) }}" class="btn btn-primary">
            <i class="bi bi-pencil"></i> Edit
        </a>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body text-center">
                <div class="avatar-circle-large mx-auto mb-3">
                    {{ strtoupper(substr($staff->name, 0, 1)) }}
                </div>
                <h4>{{ $staff->name }}</h4>
                <p class="text-muted">{{ $staff->email }}</p>
                
                <div class="d-flex justify-content-center gap-2 mb-3">
                    <span class="badge 
                        @if($staff->role == 'manager') bg-primary
                        @elseif($staff->role == 'inspector') bg-info
                        @else bg-secondary
                        @endif">
                        {{ ucfirst($staff->role) }}
                    </span>
                    <span class="badge {{ $staff->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                        {{ ucfirst($staff->status) }}
                    </span>
                </div>

                <hr>

                <div class="text-start">
                    <p class="mb-2">
                        <i class="bi bi-envelope me-2 text-muted"></i>
                        <strong>Email:</strong><br>
                        <span class="ms-4">{{ $staff->email }}</span>
                    </p>
                    <p class="mb-2">
                        <i class="bi bi-telephone me-2 text-muted"></i>
                        <strong>Phone:</strong><br>
                        <span class="ms-4">{{ $staff->phone ?? 'Not provided' }}</span>
                    </p>
                    <p class="mb-2">
                        <i class="bi bi-calendar me-2 text-muted"></i>
                        <strong>Joined:</strong><br>
                        <span class="ms-4">{{ $staff->created_at->format('M d, Y') }}</span>
                    </p>
                    @if($staff->last_login_at)
                    <p class="mb-0">
                        <i class="bi bi-clock me-2 text-muted"></i>
                        <strong>Last Login:</strong><br>
                        <span class="ms-4">{{ $staff->last_login_at->diffForHumans() }}</span>
                    </p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Performance Statistics</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="stat-card primary">
                            <div class="card-body">
                                <h6 class="text-muted mb-2">Total Inspections</h6>
                                <h3 class="mb-0">{{ $staff->inspections()->count() }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stat-card success">
                            <div class="card-body">
                                <h6 class="text-muted mb-2">Completed</h6>
                                <h3 class="mb-0">{{ $staff->inspections()->where('status', 'completed')->count() }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stat-card warning">
                            <div class="card-body">
                                <h6 class="text-muted mb-2">Scheduled</h6>
                                <h3 class="mb-0">{{ $staff->inspections()->where('status', 'scheduled')->count() }}</h3>
                            </div>
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
                                <td>{{ \Carbon\Carbon::parse($inspection->scheduled_date)->format('M d, Y') }}</td>
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
</div>

<style>
.avatar-circle-large {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 36px;
}
</style>
@endsection
