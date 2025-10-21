@extends('layout')

@section('title', 'Properties - Inspection Management System')
@section('properties-active', 'active')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Properties</h1>
        <p class="text-muted">Manage all properties and their inspection details</p>
    </div>
    <div>
        <a href="{{ route('properties.create') }}" class="btn btn-primary">
            <i class="bi bi-building-add"></i> Add New Property
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
                        <th>Property Name</th>
                        <th>Type</th>
                        <th>Client Name</th>
                        <th>Location</th>
                        <th>Square Footage</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($properties as $property)
                    <tr>
                        <td>
                            <strong>{{ $property->name }}</strong>
                        </td>
                        <td>
                            @if($property->property_type)
                            <span class="badge 
                                @if($property->property_type == 'commercial') bg-primary
                                @elseif($property->property_type == 'residential') bg-info
                                @elseif($property->property_type == 'industrial') bg-secondary
                                @else bg-warning
                                @endif">
                                {{ ucfirst($property->property_type) }}
                            </span>
                            @else
                            <span class="text-muted">N/A</span>
                            @endif
                        </td>
                        <td>{{ $property->client->name }}</td>
                        <td>
                            {{ $property->address }}<br>
                            <small class="text-muted">
                                @if($property->city || $property->state || $property->postal_code)
                                    {{ $property->city }}@if($property->city && $property->state), @endif{{ $property->state }} {{ $property->postal_code }}
                                @endif
                            </small>
                        </td>
                        <td>
                            @if($property->square_footage)
                                {{ number_format($property->square_footage) }} sq ft
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                        <td>{{ $property->created_at->format('M d, Y') }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('properties.show', $property) }}" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('properties.edit', $property) }}" class="btn btn-outline-secondary" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button type="button" class="btn btn-outline-danger" title="Delete" 
                                    onclick="if(confirm('Are you sure you want to delete this property?')) { document.getElementById('delete-form-{{ $property->id }}').submit(); }">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <form id="delete-form-{{ $property->id }}" action="{{ route('properties.destroy', $property) }}" method="POST" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <i class="bi bi-building-x text-muted" style="font-size: 3rem;"></i>
                            <p class="text-muted mt-3">No properties found</p>
                            <a href="{{ route('properties.create') }}" class="btn btn-primary">
                                <i class="bi bi-building-add"></i> Add Your First Property
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($properties->hasPages())
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div>
                <span class="text-muted">
                    Showing {{ $properties->firstItem() }} to {{ $properties->lastItem() }} of {{ $properties->total() }} properties
                </span>
            </div>
            <nav>
                {{ $properties->links() }}
            </nav>
        </div>
        @endif
    </div>
</div>
@endsection
