@extends('layout')

@section('title', 'Inspectors - Inspection Management System')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Inspectors</h1>
        <p class="text-muted">Manage inspectors and their availability</p>
    </div>
    <div>
        <a href="{{ route('inspectors.create') }}" class="btn btn-primary">
            <i class="bi bi-person-plus"></i> Add Inspector
        </a>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card stat-card primary">
            <div class="card-body">
                <h6 class="text-muted mb-2">Total Inspectors</h6>
                <h3 class="mb-0">{{ $inspectors->count() }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card success">
            <div class="card-body">
                <h6 class="text-muted mb-2">Active</h6>
                <h3 class="mb-0">{{ $inspectors->where('status', 'active')->count() }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card warning">
            <div class="card-body">
                <h6 class="text-muted mb-2">Field Agents</h6>
                <h3 class="mb-0">{{ $inspectors->where('role', 'field_agent')->count() }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card info">
            <div class="card-body">
                <h6 class="text-muted mb-2">Assessors</h6>
                <h3 class="mb-0">{{ $inspectors->where('role', 'assessor')->count() }}</h3>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header bg-white">
        <h5 class="mb-0">All Inspectors</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Inspections</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($inspectors as $inspector)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="avatar-circle me-2">
                                    {{ strtoupper(substr($inspector->name, 0, 1)) }}
                                </div>
                                <strong>{{ $inspector->name }}</strong>
                            </div>
                        </td>
                        <td>{{ $inspector->email }}</td>
                        <td>{{ $inspector->phone ?? '-' }}</td>
                        <td>
                            <span class="badge bg-info">
                                {{ ucfirst(str_replace('_', ' ', $inspector->role)) }}
                            </span>
                        </td>
                        <td>
                            <span class="badge {{ $inspector->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                                {{ ucfirst($inspector->status) }}
                            </span>
                        </td>
                        <td>{{ $inspector->inspections_count }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('inspectors.show', $inspector) }}" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('inspectors.edit', $inspector) }}" class="btn btn-outline-secondary" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="{{ route('inspectors.availability', $inspector) }}" class="btn btn-outline-info" title="Availability">
                                    <i class="bi bi-calendar-check"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <i class="bi bi-people text-muted" style="font-size: 3rem;"></i>
                            <p class="text-muted mt-3">No inspectors found</p>
                            <a href="{{ route('inspectors.create') }}" class="btn btn-primary">
                                <i class="bi bi-person-plus"></i> Add First Inspector
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
