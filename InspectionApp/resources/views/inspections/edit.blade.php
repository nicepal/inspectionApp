@extends('layout')

@section('title', 'Edit Inspection - Inspection Management System')

@section('content')
<div class="page-header">
    <h1 class="page-title">Edit Inspection</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inspections.index') }}">Inspections</a></li>
            <li class="breadcrumb-item active">Edit #{{ $inspection->inspection_number }}</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="mb-0">Inspection Details</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('inspections.update', $inspection) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="property_id" class="form-label">Property <span class="text-danger">*</span></label>
                                <select class="form-select @error('property_id') is-invalid @enderror" id="property_id" name="property_id" required>
                                    <option value="">Select property</option>
                                    @foreach($properties as $property)
                                    <option value="{{ $property->id }}" {{ old('property_id', $inspection->property_id) == $property->id ? 'selected' : '' }}>
                                        {{ $property->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('property_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="client_id" class="form-label">Client <span class="text-danger">*</span></label>
                                <select class="form-select @error('client_id') is-invalid @enderror" id="client_id" name="client_id" required>
                                    <option value="">Select client</option>
                                    @foreach($clients as $client)
                                    <option value="{{ $client->id }}" {{ old('client_id', $inspection->client_id) == $client->id ? 'selected' : '' }}>
                                        {{ $client->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('client_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="inspection_type" class="form-label">Inspection Type <span class="text-danger">*</span></label>
                                <select class="form-select @error('inspection_type') is-invalid @enderror" id="inspection_type" name="inspection_type" required>
                                    <option value="fire_safety" {{ old('inspection_type', $inspection->inspection_type) == 'fire_safety' ? 'selected' : '' }}>Fire Safety</option>
                                    <option value="structural" {{ old('inspection_type', $inspection->inspection_type) == 'structural' ? 'selected' : '' }}>Structural</option>
                                    <option value="compliance" {{ old('inspection_type', $inspection->inspection_type) == 'compliance' ? 'selected' : '' }}>Compliance</option>
                                    <option value="safety_audit" {{ old('inspection_type', $inspection->inspection_type) == 'safety_audit' ? 'selected' : '' }}>Safety Audit</option>
                                    <option value="electrical" {{ old('inspection_type', $inspection->inspection_type) == 'electrical' ? 'selected' : '' }}>Electrical</option>
                                </select>
                                @error('inspection_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="inspector_id" class="form-label">Inspector <small class="text-muted">(showing available inspectors)</small></label>
                                <select class="form-select @error('inspector_id') is-invalid @enderror" id="inspector_id" name="inspector_id">
                                    <option value="">Not assigned</option>
                                    @foreach($inspectors as $inspector)
                                    <option value="{{ $inspector->id }}" {{ old('inspector_id', $inspection->inspector_id) == $inspector->id ? 'selected' : '' }}>
                                        {{ $inspector->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('inspector_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted" id="availability-status"></small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="scheduled_at" class="form-label">Scheduled Date <span class="text-danger">*</span></label>
                                <input type="datetime-local" class="form-control @error('scheduled_at') is-invalid @enderror" 
                                    id="scheduled_at" name="scheduled_at" value="{{ old('scheduled_at', $inspection->scheduled_at?->format('Y-m-d\TH:i')) }}" required>
                                @error('scheduled_at')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                                    <option value="scheduled" {{ old('status', $inspection->status) == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                                    <option value="in_progress" {{ old('status', $inspection->status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="completed" {{ old('status', $inspection->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ old('status', $inspection->status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="result" class="form-label">Result</label>
                                <select class="form-select @error('result') is-invalid @enderror" id="result" name="result">
                                    <option value="">Not completed</option>
                                    <option value="pass" {{ old('result', $inspection->result) == 'pass' ? 'selected' : '' }}>Pass</option>
                                    <option value="fail" {{ old('result', $inspection->result) == 'fail' ? 'selected' : '' }}>Fail</option>
                                    <option value="conditional" {{ old('result', $inspection->result) == 'conditional' ? 'selected' : '' }}>Conditional</option>
                                </select>
                                @error('result')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="notes" class="form-label">Notes</label>
                        <textarea class="form-control @error('notes') is-invalid @enderror" 
                            id="notes" name="notes" rows="4">{{ old('notes', $inspection->notes) }}</textarea>
                        @error('notes')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('inspections.show', $inspection) }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg"></i> Update Inspection
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const scheduledInput = document.getElementById('scheduled_at');
    const inspectorSelect = document.getElementById('inspector_id');
    const availabilityStatus = document.getElementById('availability-status');
    
    function updateInspectorAvailability() {
        if (!scheduledInput.value) {
            availabilityStatus.textContent = '';
            return;
        }
        
        const datetime = new Date(scheduledInput.value);
        const date = datetime.toISOString().split('T')[0];
        const time = datetime.toTimeString().split(' ')[0];
        
        fetch(`{{ route('api.available-inspectors') }}?date=${date}&time=${time}`)
            .then(response => response.json())
            .then(data => {
                const currentSelection = inspectorSelect.value;
                inspectorSelect.innerHTML = '<option value="">Not assigned</option>';
                
                let availableCount = 0;
                data.inspectors.forEach(inspector => {
                    const option = document.createElement('option');
                    option.value = inspector.id;
                    option.textContent = inspector.name;
                    
                    if (inspector.is_available) {
                        option.textContent += ' ✓';
                        availableCount++;
                    } else {
                        option.textContent += ' (Unavailable)';
                        option.style.color = '#999';
                    }
                    
                    if (inspector.id == currentSelection) {
                        option.selected = true;
                    }
                    
                    inspectorSelect.appendChild(option);
                });
                
                availabilityStatus.textContent = `${availableCount} inspector(s) available`;
                availabilityStatus.className = availableCount > 0 ? 'text-success' : 'text-warning';
            })
            .catch(error => {
                console.error('Error fetching availability:', error);
                availabilityStatus.textContent = 'Could not check availability';
                availabilityStatus.className = 'text-danger';
            });
    }
    
    scheduledInput.addEventListener('change', updateInspectorAvailability);
    
    // Check availability on page load if date is set
    if (scheduledInput.value) {
        updateInspectorAvailability();
    }
});
</script>
@endpush

