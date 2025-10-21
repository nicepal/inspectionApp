@extends('layout')

@section('title', 'Inspection Types - Inspection Management System')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Inspection Types</h1>
        <p class="text-muted">Manage inspection categories and types</p>
    </div>
    <div>
        <a href="{{ route('inspection-types.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add New Type
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
                        <th style="width: 50px;">Color</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Type</th>
                        <th>Sort Order</th>
                        <th style="width: 150px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($types as $type)
                    <tr>
                        <td>
                            <span class="d-inline-block" style="width: 30px; height: 30px; background-color: {{ $type->color }}; border-radius: 4px;"></span>
                        </td>
                        <td><strong>{{ $type->name }}</strong></td>
                        <td>{{ Str::limit($type->description, 50) }}</td>
                        <td>
                            @if($type->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                        <td>
                            @if($type->is_system)
                                <span class="badge bg-info">System</span>
                            @else
                                <span class="badge bg-primary">Custom</span>
                            @endif
                        </td>
                        <td>{{ $type->sort_order }}</td>
                        <td>
                            @if(!$type->is_system && (!$type->company_id || $type->company_id == Auth::user()->company_id))
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('inspection-types.edit', $type) }}" class="btn btn-outline-primary" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button type="button" class="btn btn-outline-danger" title="Delete" 
                                    onclick="if(confirm('Are you sure you want to delete this inspection type?')) { document.getElementById('delete-form-{{ $type->id }}').submit(); }">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <form id="delete-form-{{ $type->id }}" action="{{ route('inspection-types.destroy', $type) }}" method="POST" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                            @else
                            <span class="text-muted small">System Type</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <i class="bi bi-tag text-muted" style="font-size: 3rem;"></i>
                            <p class="text-muted mt-3">No inspection types found</p>
                            <a href="{{ route('inspection-types.create') }}" class="btn btn-primary">
                                <i class="bi bi-plus-circle"></i> Add Your First Type
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
