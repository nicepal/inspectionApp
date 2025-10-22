@extends('layout')

@section('title', 'Schedule New Inspection - Inspection Management System')
@section('inspections-active', 'active')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="page-title">Schedule New Inspection</h1>
            <p class="text-muted">Create a new inspection appointment</p>
        </div>
        <div>
            <a href="{{ route('inspections.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Back to Inspections
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-10 mx-auto">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('inspections.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <h5 class="border-bottom pb-2 mb-3">Property & Client Information</h5>
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="property_id" class="form-label">Select Property <span class="text-danger">*</span></label>
                                <select class="form-select @error('property_id') is-invalid @enderror" id="property_id" name="property_id" required>
                                    <option value="">Choose a property...</option>
                                    @foreach($properties as $property)
                                    <option value="{{ $property->id }}" {{ old('property_id') == $property->id ? 'selected' : '' }}>
                                        {{ $property->name }} - {{ $property->address }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('property_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Don't see the property? <a href="{{ route('properties.create') }}">Add a new property</a></small>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="client_id" class="form-label">Client <span class="text-danger">*</span></label>
                                <select class="form-select @error('client_id') is-invalid @enderror" id="client_id" name="client_id" required>
                                    <option value="">Select client...</option>
                                    @foreach($clients as $client)
                                    <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
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

                    <div class="mb-4">
                        <h5 class="border-bottom pb-2 mb-3">Inspection Details</h5>
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="inspection_type" class="form-label">Inspection Type <span class="text-danger">*</span></label>
                                <select class="form-select @error('inspection_type') is-invalid @enderror" id="inspection_type" name="inspection_type" required>
                                    <option value="">Select Type</option>
                                    <option value="fire_safety" {{ old('inspection_type') == 'fire_safety' ? 'selected' : '' }}>Fire Safety</option>
                                    <option value="structural" {{ old('inspection_type') == 'structural' ? 'selected' : '' }}>Structural</option>
                                    <option value="compliance" {{ old('inspection_type') == 'compliance' ? 'selected' : '' }}>Compliance</option>
                                    <option value="safety_audit" {{ old('inspection_type') == 'safety_audit' ? 'selected' : '' }}>Safety Audit</option>
                                    <option value="electrical" {{ old('inspection_type') == 'electrical' ? 'selected' : '' }}>Electrical</option>
                                </select>
                                @error('inspection_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6">
                                <label for="inspector_id" class="form-label">Select Inspector <small class="text-muted">(showing available)</small></label>
                                <select class="form-select @error('inspector_id') is-invalid @enderror" id="inspector_id" name="inspector_id">
                                    <option value="">Not assigned</option>
                                    @foreach($inspectors as $inspector)
                                    <option value="{{ $inspector->id }}" {{ old('inspector_id') == $inspector->id ? 'selected' : '' }}>
                                        {{ $inspector->name }} - {{ ucfirst(str_replace('_', ' ', $inspector->role)) }}
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

                    <div class="mb-4">
                        <h5 class="border-bottom pb-2 mb-3">Schedule</h5>
                        
                        <div class="row g-3">
                            <div class="col-md-8">
                                <label for="scheduled_at" class="form-label">Inspection Date & Time <span class="text-danger">*</span></label>
                                <input type="datetime-local" 
                                    class="form-control @error('scheduled_at') is-invalid @enderror" 
                                    id="scheduled_at" 
                                    name="scheduled_at" 
                                    value="{{ old('scheduled_at') }}"
                                    required>
                                @error('scheduled_at')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5 class="border-bottom pb-2 mb-3">Additional Information</h5>
                        
                        <div class="mb-3">
                            <label for="notes" class="form-label">Special Instructions / Notes</label>
                            <textarea class="form-control @error('notes') is-invalid @enderror" 
                                id="notes" 
                                name="notes" 
                                rows="4" 
                                placeholder="Enter any special instructions, access codes, or important notes for the inspector...">{{ old('notes') }}</textarea>
                            @error('notes')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                        <a href="{{ route('inspections.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle"></i> Schedule Inspection
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
// Inspector availability checking
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
                    option.textContent = inspector.name + ' - ' + inspector.role.replace('_', ' ');
                    
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
                
                availabilityStatus.textContent = `${availableCount} inspector(s) available at this time`;
                availabilityStatus.className = availableCount > 0 ? 'text-success' : 'text-warning';
            })
            .catch(error => {
                console.error('Error fetching availability:', error);
                availabilityStatus.textContent = 'Could not check availability';
                availabilityStatus.className = 'text-danger';
            });
    }
    
    scheduledInput.addEventListener('change', updateInspectorAvailability);
    
    // Check availability on page load if datetime is set (e.g., from validation errors)
    if (scheduledInput.value) {
        updateInspectorAvailability();
    }
});
</script>
@endpush
