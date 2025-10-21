@extends('layout')

@section('title', 'Inspections - Inspection Management System')
@section('inspections-active', 'active')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Inspections</h1>
        <p class="text-muted">Track and manage all property inspections</p>
    </div>
    <div>
        <a href="{{ route('inspections.create') }}" class="btn btn-primary">
            <i class="bi bi-calendar-plus"></i> Schedule New Inspection
        </a>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Property Name</th>
                        <th>Client</th>
                        <th>Type</th>
                        <th>Inspector</th>
                        <th>Scheduled Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($inspections as $inspection)
                    <tr>
                        <td><strong>{{ $inspection->inspection_number }}</strong></td>
                        <td>
                            <strong>{{ $inspection->property->name }}</strong><br>
                            <small class="text-muted">{{ $inspection->property->address }}</small>
                        </td>
                        <td>{{ $inspection->client->name }}</td>
                        <td>
                            <span class="badge 
                                @if($inspection->inspection_type == 'fire_safety') bg-danger
                                @elseif($inspection->inspection_type == 'structural') bg-primary
                                @elseif($inspection->inspection_type == 'electrical') bg-warning
                                @elseif($inspection->inspection_type == 'compliance') bg-info
                                @else bg-secondary
                                @endif">
                                {{ ucfirst(str_replace('_', ' ', $inspection->inspection_type)) }}
                            </span>
                        </td>
                        <td>{{ $inspection->inspector->name ?? 'Unassigned' }}</td>
                        <td>{{ $inspection->scheduled_at->format('M d, Y h:i A') }}</td>
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
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('inspections.show', $inspection) }}" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('inspections.edit', $inspection) }}" class="btn btn-outline-secondary" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button type="button" class="btn btn-outline-danger" title="Delete" 
                                    onclick="if(confirm('Are you sure you want to delete this inspection?')) { document.getElementById('delete-form-{{ $inspection->id }}').submit(); }">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <form id="delete-form-{{ $inspection->id }}" action="{{ route('inspections.destroy', $inspection) }}" method="POST" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-5">
                            <i class="bi bi-clipboard-x text-muted" style="font-size: 3rem;"></i>
                            <p class="text-muted mt-3">No inspections found</p>
                            <a href="{{ route('inspections.create') }}" class="btn btn-primary">
                                <i class="bi bi-calendar-plus"></i> Schedule Your First Inspection
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($inspections->hasPages())
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div>
                <span class="text-muted">
                    Showing {{ $inspections->firstItem() }} to {{ $inspections->lastItem() }} of {{ $inspections->total() }} inspections
                </span>
            </div>
            <nav>
                {{ $inspections->links() }}
            </nav>
        </div>
        @endif
    </div>
</div>
@endsection
