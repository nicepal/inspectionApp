@extends('layout')

@section('title', 'Clients - Inspection Management System')
@section('clients-active', 'active')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Clients</h1>
        <p class="text-muted">Manage all clients and their properties</p>
    </div>
    <div>
        <a href="{{ route('clients.create') }}" class="btn btn-primary">
            <i class="bi bi-person-plus"></i> Add New Client
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
                        <th>Client Name</th>
                        <th>Type</th>
                        <th>Contact Info</th>
                        <th>Address</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clients as $client)
                    <tr>
                        <td><strong>{{ $client->name }}</strong></td>
                        <td>
                            <span class="badge 
                                @if($client->client_type == 'company') bg-primary
                                @elseif($client->client_type == 'individual') bg-info
                                @else bg-secondary
                                @endif">
                                {{ ucfirst($client->client_type) }}
                            </span>
                        </td>
                        <td>
                            @if($client->email)
                                <i class="bi bi-envelope"></i> {{ $client->email }}<br>
                            @endif
                            @if($client->phone)
                                <i class="bi bi-telephone"></i> {{ $client->phone }}
                            @endif
                        </td>
                        <td>
                            @if($client->address)
                                {{ $client->address }}<br>
                                <small class="text-muted">
                                    {{ $client->city }}@if($client->city && $client->state), @endif{{ $client->state }} {{ $client->postal_code }}
                                </small>
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                        <td>{{ $client->created_at->format('M d, Y') }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('clients.show', $client) }}" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('clients.edit', $client) }}" class="btn btn-outline-secondary" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button type="button" class="btn btn-outline-danger" title="Delete" 
                                    onclick="if(confirm('Are you sure you want to delete this client?')) { document.getElementById('delete-form-{{ $client->id }}').submit(); }">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <form id="delete-form-{{ $client->id }}" action="{{ route('clients.destroy', $client) }}" method="POST" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <i class="bi bi-people text-muted" style="font-size: 3rem;"></i>
                            <p class="text-muted mt-3">No clients found</p>
                            <a href="{{ route('clients.create') }}" class="btn btn-primary">
                                <i class="bi bi-person-plus"></i> Add Your First Client
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($clients->hasPages())
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div>
                <span class="text-muted">
                    Showing {{ $clients->firstItem() }} to {{ $clients->lastItem() }} of {{ $clients->total() }} clients
                </span>
            </div>
            <nav>
                {{ $clients->links() }}
            </nav>
        </div>
        @endif
    </div>
</div>
@endsection
