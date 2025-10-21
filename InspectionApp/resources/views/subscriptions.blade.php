@extends('layout')

@section('title', 'Subscriptions - Inspection Management System')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Subscriptions</h1>
        <p class="text-muted">Manage subscription plans and billing</p>
    </div>
    <div>
        <a href="{{ route('subscriptions.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add Subscription
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
                        <th>Plan</th>
                        <th>Price</th>
                        <th>Billing Cycle</th>
                        <th>Status</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Limits</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($subscriptions as $subscription)
                    <tr>
                        <td>
                            <strong>{{ $subscription->plan_name }}</strong>
                            @if(auth()->user()->isAdmin())
                            <br><small class="text-muted">{{ $subscription->company->name }}</small>
                            @endif
                        </td>
                        <td>${{ number_format($subscription->price, 2) }}</td>
                        <td>{{ ucfirst($subscription->billing_cycle) }}</td>
                        <td>
                            <span class="badge 
                                @if($subscription->status == 'active') bg-success
                                @elseif($subscription->status == 'trial') bg-info
                                @elseif($subscription->status == 'cancelled') bg-warning
                                @else bg-danger
                                @endif">
                                {{ ucfirst($subscription->status) }}
                            </span>
                        </td>
                        <td>{{ $subscription->start_date->format('M d, Y') }}</td>
                        <td>{{ $subscription->end_date ? $subscription->end_date->format('M d, Y') : 'N/A' }}</td>
                        <td>
                            <small>
                                Users: {{ $subscription->max_users }}<br>
                                Properties: {{ $subscription->max_properties }}<br>
                                Inspections: {{ $subscription->max_inspections_per_month }}/mo
                            </small>
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('subscriptions.edit', $subscription) }}" class="btn btn-outline-primary" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button type="button" class="btn btn-outline-danger" title="Delete" 
                                    onclick="if(confirm('Are you sure you want to delete this subscription?')) { document.getElementById('delete-form-{{ $subscription->id }}').submit(); }">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <form id="delete-form-{{ $subscription->id }}" action="{{ route('subscriptions.destroy', $subscription) }}" method="POST" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-5">
                            <i class="bi bi-credit-card text-muted" style="font-size: 3rem;"></i>
                            <p class="text-muted mt-3">No subscriptions found</p>
                            <a href="{{ route('subscriptions.create') }}" class="btn btn-primary">
                                <i class="bi bi-plus-circle"></i> Add Your First Subscription
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($subscriptions->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $subscriptions->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
