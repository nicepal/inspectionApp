@extends('layout')

@section('title', $client->name . ' - Client Details')
@section('clients-active', 'active')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="page-title">{{ $client->name }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('clients.index') }}">Clients</a></li>
                    <li class="breadcrumb-item active">{{ $client->name }}</li>
                </ol>
            </nav>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('clients.edit', $client) }}" class="btn btn-primary">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <form action="{{ route('clients.destroy', $client) }}" method="POST" class="d-inline"
                onsubmit="return confirm('Are you sure you want to delete this client? This action cannot be undone.');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-trash"></i> Delete
                </button>
            </form>
        </div>
    </div>
</div>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="row">
    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Client Information</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="text-muted small">Client Type</label>
                    <div>
                        @if($client->client_type == 'individual')
                            <span class="badge bg-info">Individual</span>
                        @elseif($client->client_type == 'company')
                            <span class="badge bg-primary">Company</span>
                        @else
                            <span class="badge bg-success">Government</span>
                        @endif
                    </div>
                </div>

                <div class="mb-3">
                    <label class="text-muted small">Status</label>
                    <div>
                        @if($client->status == 'active')
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </div>
                </div>

                @if($client->email)
                <div class="mb-3">
                    <label class="text-muted small">Email</label>
                    <div><a href="mailto:{{ $client->email }}">{{ $client->email }}</a></div>
                </div>
                @endif

                @if($client->phone)
                <div class="mb-3">
                    <label class="text-muted small">Primary Phone</label>
                    <div><a href="tel:{{ $client->phone }}">{{ $client->phone }}</a></div>
                </div>
                @endif

                @if($client->secondary_phone)
                <div class="mb-3">
                    <label class="text-muted small">Secondary Phone</label>
                    <div><a href="tel:{{ $client->secondary_phone }}">{{ $client->secondary_phone }}</a></div>
                </div>
                @endif

                @if($client->address || $client->city || $client->state || $client->postal_code || $client->country)
                <div class="mb-3">
                    <label class="text-muted small">Address</label>
                    <div>
                        @if($client->address)
                            {{ $client->address }}<br>
                        @endif
                        @if($client->city || $client->state || $client->postal_code)
                            {{ $client->city }}@if($client->city && $client->state),@endif {{ $client->state }} {{ $client->postal_code }}<br>
                        @endif
                        @if($client->country)
                            {{ $client->country }}
                        @endif
                    </div>
                </div>
                @endif

                @if($client->notes)
                <div class="mb-3">
                    <label class="text-muted small">Notes</label>
                    <div class="text-break">{{ $client->notes }}</div>
                </div>
                @endif

                <div class="mb-0">
                    <label class="text-muted small">Created</label>
                    <div>{{ $client->created_at->format('M d, Y') }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Properties ({{ $client->properties->count() }})</h5>
                <a href="{{ route('properties.create', ['client_id' => $client->id]) }}" class="btn btn-sm btn-primary">
                    <i class="bi bi-plus-circle"></i> Add Property
                </a>
            </div>
            <div class="card-body">
                @if($client->properties->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Property Name</th>
                                    <th>Type</th>
                                    <th>Address</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($client->properties as $property)
                                <tr>
                                    <td>
                                        <a href="{{ route('properties.show', $property) }}">{{ $property->name }}</a>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary">{{ ucfirst($property->property_type) }}</span>
                                    </td>
                                    <td>{{ $property->address ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('properties.show', $property) }}" class="btn btn-sm btn-outline-primary">View</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted mb-0">No properties added yet.</p>
                @endif
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Recent Inspections ({{ $client->inspections->count() }})</h5>
            </div>
            <div class="card-body">
                @if($client->inspections->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Property</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($client->inspections->take(10) as $inspection)
                                <tr>
                                    <td>{{ $inspection->scheduled_date ? $inspection->scheduled_date->format('M d, Y') : '-' }}</td>
                                    <td>{{ $inspection->inspection_type }}</td>
                                    <td>
                                        @if($inspection->property)
                                            <a href="{{ route('properties.show', $inspection->property) }}">{{ $inspection->property->name }}</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if($inspection->status == 'completed')
                                            <span class="badge bg-success">Completed</span>
                                        @elseif($inspection->status == 'in_progress')
                                            <span class="badge bg-primary">In Progress</span>
                                        @elseif($inspection->status == 'scheduled')
                                            <span class="badge bg-info">Scheduled</span>
                                        @else
                                            <span class="badge bg-secondary">{{ ucfirst($inspection->status) }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('inspections.show', $inspection) }}" class="btn btn-sm btn-outline-primary">View</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted mb-0">No inspections found.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
