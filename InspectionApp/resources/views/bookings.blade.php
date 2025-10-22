@extends('layout')

@section('title', 'Bookings - Inspection Management System')
@section('bookings-active', 'active')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Bookings</h1>
        <p class="text-muted">Manage inspection bookings and schedules</p>
    </div>
    <div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newBookingModal">
            <i class="bi bi-calendar-plus"></i> New Booking
        </button>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="card">
    <div class="card-header bg-white">
        <h5 class="mb-0">Upcoming Bookings</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Date & Time</th>
                        <th>Property</th>
                        <th>Client</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($upcomingBookings as $booking)
                    <tr>
                        <td>
                            <strong>{{ $booking->scheduled_at->format('M d, Y') }}</strong><br>
                            <small class="text-muted">{{ $booking->scheduled_at->format('h:i A') }}</small>
                        </td>
                        <td>{{ $booking->property->name }}</td>
                        <td>{{ $booking->property->client->name }}</td>
                        <td>
                            <span class="badge bg-primary">{{ ucfirst(str_replace('_', ' ', $booking->inspection_type)) }}</span>
                        </td>
                        <td>
                            <span class="badge 
                                @if($booking->status == 'scheduled') bg-info
                                @elseif($booking->status == 'in_progress') bg-warning
                                @elseif($booking->status == 'completed') bg-success
                                @else bg-secondary
                                @endif">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('inspections.show', $booking) }}" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('inspections.edit', $booking) }}" class="btn btn-outline-secondary" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <i class="bi bi-calendar-x text-muted" style="font-size: 3rem;"></i>
                            <p class="text-muted mt-3">No upcoming bookings</p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newBookingModal">
                                <i class="bi bi-calendar-plus"></i> Create Your First Booking
                            </button>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- New Booking Modal -->
<div class="modal fade" id="newBookingModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Booking</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('bookings.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="property_id" class="form-label">Property <span class="text-danger">*</span></label>
                                <select class="form-select @error('property_id') is-invalid @enderror" 
                                    id="property_id" name="property_id" required>
                                    <option value="">Select property</option>
                                    @foreach($properties as $property)
                                    <option value="{{ $property->id }}" {{ old('property_id') == $property->id ? 'selected' : '' }}>
                                        {{ $property->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('property_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="scheduled_date" class="form-label">Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('scheduled_date') is-invalid @enderror" 
                                    id="scheduled_date" name="scheduled_date" value="{{ old('scheduled_date') }}" required>
                                @error('scheduled_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="scheduled_time" class="form-label">Time <span class="text-danger">*</span></label>
                                <input type="time" class="form-control @error('scheduled_time') is-invalid @enderror" 
                                    id="scheduled_time" name="scheduled_time" value="{{ old('scheduled_time') }}" required>
                                @error('scheduled_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="type" class="form-label">Inspection Type <span class="text-danger">*</span></label>
                                <select class="form-select @error('type') is-invalid @enderror" 
                                    id="type" name="type" required>
                                    <option value="">Select type</option>
                                    <option value="fire_safety" {{ old('type') == 'fire_safety' ? 'selected' : '' }}>Fire Safety</option>
                                    <option value="property_survey" {{ old('type') == 'property_survey' ? 'selected' : '' }}>Property Survey</option>
                                    <option value="compliance" {{ old('type') == 'compliance' ? 'selected' : '' }}>Compliance Check</option>
                                    <option value="maintenance" {{ old('type') == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                                    <option value="risk_assessment" {{ old('type') == 'risk_assessment' ? 'selected' : '' }}>Risk Assessment</option>
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="notes" class="form-label">Notes</label>
                                <textarea class="form-control @error('notes') is-invalid @enderror" 
                                    id="notes" name="notes" rows="4">{{ old('notes') }}</textarea>
                                @error('notes')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Create Booking
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
