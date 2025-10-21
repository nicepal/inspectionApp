@extends('layout')

@section('title', 'Edit Property - Inspection Management System')
@section('properties-active', 'active')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="page-title">Edit Property</h1>
            <p class="text-muted">Update property details and information</p>
        </div>
        <div>
            <a href="{{ route('properties.show', $property) }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Back to Property
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('properties.update', $property) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    
                    <div class="mb-4">
                        <h5 class="border-bottom pb-2 mb-3">Basic Information</h5>
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Property Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                    id="name" name="name" value="{{ old('name', $property->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6">
                                <label for="property_type" class="form-label">Property Type</label>
                                <select class="form-select @error('property_type') is-invalid @enderror" 
                                    id="property_type" name="property_type">
                                    <option value="">Select Type</option>
                                    <option value="residential" {{ old('property_type', $property->property_type) == 'residential' ? 'selected' : '' }}>Residential</option>
                                    <option value="commercial" {{ old('property_type', $property->property_type) == 'commercial' ? 'selected' : '' }}>Commercial</option>
                                    <option value="industrial" {{ old('property_type', $property->property_type) == 'industrial' ? 'selected' : '' }}>Industrial</option>
                                </select>
                                @error('property_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-12">
                                <label for="client_id" class="form-label">Client Name <span class="text-danger">*</span></label>
                                <select class="form-select @error('client_id') is-invalid @enderror" 
                                    id="client_id" name="client_id" required>
                                    <option value="">Select Client</option>
                                    @foreach($clients as $client)
                                        <option value="{{ $client->id }}" {{ old('client_id', $property->client_id) == $client->id ? 'selected' : '' }}>
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
                        <h5 class="border-bottom pb-2 mb-3">Address Information</h5>
                        
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="address" class="form-label">Street Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" 
                                    id="address" name="address" value="{{ old('address', $property->address) }}" required>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control @error('city') is-invalid @enderror" 
                                    id="city" name="city" value="{{ old('city', $property->city) }}">
                                @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-3">
                                <label for="state" class="form-label">State</label>
                                <input type="text" class="form-control @error('state') is-invalid @enderror" 
                                    id="state" name="state" value="{{ old('state', $property->state) }}">
                                @error('state')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-3">
                                <label for="postal_code" class="form-label">Postal Code</label>
                                <input type="text" class="form-control @error('postal_code') is-invalid @enderror" 
                                    id="postal_code" name="postal_code" value="{{ old('postal_code', $property->postal_code) }}">
                                @error('postal_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" class="form-control @error('country') is-invalid @enderror" 
                                    id="country" name="country" value="{{ old('country', $property->country) }}">
                                @error('country')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5 class="border-bottom pb-2 mb-3">Property Details</h5>
                        
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label for="square_footage" class="form-label">Square Footage</label>
                                <input type="number" class="form-control @error('square_footage') is-invalid @enderror" 
                                    id="square_footage" name="square_footage" value="{{ old('square_footage', $property->square_footage) }}" step="0.01">
                                @error('square_footage')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-3">
                                <label for="floors" class="form-label">Number of Floors</label>
                                <input type="number" class="form-control @error('floors') is-invalid @enderror" 
                                    id="floors" name="floors" value="{{ old('floors', $property->floors) }}" min="1">
                                @error('floors')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-3">
                                <label for="year_built" class="form-label">Year Built</label>
                                <input type="number" class="form-control @error('year_built') is-invalid @enderror" 
                                    id="year_built" name="year_built" value="{{ old('year_built', $property->year_built) }}" 
                                    min="1800" max="{{ date('Y') + 1 }}">
                                @error('year_built')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-12">
                                <label for="description" class="form-label">Additional Notes</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" 
                                    id="description" name="description" rows="4" 
                                    placeholder="Enter any additional information about the property...">{{ old('description', $property->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                        <a href="{{ route('properties.show', $property) }}" class="btn btn-outline-secondary">Cancel</a>
                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle"></i> Update Property
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
