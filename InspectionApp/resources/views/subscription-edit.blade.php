@extends('layout')

@section('title', 'Edit Subscription - Inspection Management System')

@section('content')
<div class="page-header">
    <h1 class="page-title">Edit Subscription</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('subscriptions.index') }}">Subscriptions</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('subscriptions.update', $subscription) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="plan_name" class="form-label">Plan Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('plan_name') is-invalid @enderror" 
                            id="plan_name" name="plan_name" value="{{ old('plan_name', $subscription->plan_name) }}" required>
                        @error('plan_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" 
                                id="price" name="price" value="{{ old('price', $subscription->price) }}" required>
                        </div>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="billing_cycle" class="form-label">Billing Cycle <span class="text-danger">*</span></label>
                        <select class="form-select @error('billing_cycle') is-invalid @enderror" 
                            id="billing_cycle" name="billing_cycle" required>
                            <option value="monthly" {{ old('billing_cycle', $subscription->billing_cycle) == 'monthly' ? 'selected' : '' }}>Monthly</option>
                            <option value="yearly" {{ old('billing_cycle', $subscription->billing_cycle) == 'yearly' ? 'selected' : '' }}>Yearly</option>
                        </select>
                        @error('billing_cycle')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror" 
                            id="status" name="status" required>
                            <option value="trial" {{ old('status', $subscription->status) == 'trial' ? 'selected' : '' }}>Trial</option>
                            <option value="active" {{ old('status', $subscription->status) == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="cancelled" {{ old('status', $subscription->status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            <option value="expired" {{ old('status', $subscription->status) == 'expired' ? 'selected' : '' }}>Expired</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Start Date <span class="text-danger">*</span></label>
                        <input type="date" class="form-control @error('start_date') is-invalid @enderror" 
                            id="start_date" name="start_date" value="{{ old('start_date', $subscription->start_date->format('Y-m-d')) }}" required>
                        @error('start_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" class="form-control @error('end_date') is-invalid @enderror" 
                            id="end_date" name="end_date" value="{{ old('end_date', $subscription->end_date?->format('Y-m-d')) }}">
                        @error('end_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="max_users" class="form-label">Max Users <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('max_users') is-invalid @enderror" 
                            id="max_users" name="max_users" value="{{ old('max_users', $subscription->max_users) }}" required>
                        @error('max_users')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="max_properties" class="form-label">Max Properties <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('max_properties') is-invalid @enderror" 
                            id="max_properties" name="max_properties" value="{{ old('max_properties', $subscription->max_properties) }}" required>
                        @error('max_properties')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="max_inspections_per_month" class="form-label">Max Inspections/Month <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('max_inspections_per_month') is-invalid @enderror" 
                            id="max_inspections_per_month" name="max_inspections_per_month" value="{{ old('max_inspections_per_month', $subscription->max_inspections_per_month) }}" required>
                        @error('max_inspections_per_month')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('subscriptions.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Update Subscription
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
