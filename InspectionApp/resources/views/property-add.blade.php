@extends('layout')

@section('title', 'Add New Property - Inspection Management System')
@section('properties-active', 'active')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="page-title">Add New Property</h1>
            <p class="text-muted">Enter property details and information</p>
        </div>
        <div>
            <a href="/properties" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Back to Properties
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="mb-4">
                        <h5 class="border-bottom pb-2 mb-3">Basic Information</h5>
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="propertyName" class="form-label">Property Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="propertyName" required>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="propertyType" class="form-label">Property Type <span class="text-danger">*</span></label>
                                <select class="form-select" id="propertyType" required>
                                    <option value="">Select Type</option>
                                    <option value="residential">Residential</option>
                                    <option value="commercial">Commercial</option>
                                    <option value="industrial">Industrial</option>
                                    <option value="mixed">Mixed Use</option>
                                </select>
                            </div>
                            
                            <div class="col-md-12">
                                <label for="clientName" class="form-label">Client Name <span class="text-danger">*</span></label>
                                <select class="form-select" id="clientName" required>
                                    <option value="">Select Client</option>
                                    <option value="1">ABC Corporation</option>
                                    <option value="2">Property Holdings Inc</option>
                                    <option value="3">Tech Ventures LLC</option>
                                    <option value="4">Manufacturing Co</option>
                                    <option value="5">Coastal Properties</option>
                                </select>
                                <small class="text-muted">Don't see your client? <a href="/clients/add">Add a new client</a></small>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5 class="border-bottom pb-2 mb-3">Address Information</h5>
                        
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="street" class="form-label">Street Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="street" required>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="city" class="form-label">City <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="city" required>
                            </div>
                            
                            <div class="col-md-3">
                                <label for="state" class="form-label">State <span class="text-danger">*</span></label>
                                <select class="form-select" id="state" required>
                                    <option value="">Select State</option>
                                    <option value="CA">California</option>
                                    <option value="NY">New York</option>
                                    <option value="TX">Texas</option>
                                    <option value="FL">Florida</option>
                                    <option value="IL">Illinois</option>
                                </select>
                            </div>
                            
                            <div class="col-md-3">
                                <label for="zip" class="form-label">Zip Code <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="zip" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5 class="border-bottom pb-2 mb-3">Property Details</h5>
                        
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label for="buildingSize" class="form-label">Building Size</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="buildingSize">
                                    <select class="form-select" style="max-width: 100px;">
                                        <option value="sqft">Sq. Ft</option>
                                        <option value="acres">Acres</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <label for="floors" class="form-label">Number of Floors</label>
                                <input type="number" class="form-control" id="floors" min="1">
                            </div>
                            
                            <div class="col-md-3">
                                <label for="rooms" class="form-label">Number of Rooms</label>
                                <input type="number" class="form-control" id="rooms" min="1">
                            </div>
                            
                            <div class="col-md-3">
                                <label for="yearBuilt" class="form-label">Construction Year</label>
                                <input type="number" class="form-control" id="yearBuilt" min="1800" max="2025">
                            </div>
                            
                            <div class="col-md-12">
                                <label for="notes" class="form-label">Additional Notes</label>
                                <textarea class="form-control" id="notes" rows="4" placeholder="Enter any additional information about the property..."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5 class="border-bottom pb-2 mb-3">Media & Documents</h5>
                        
                        <div class="mb-3">
                            <label for="propertyImages" class="form-label">Property Images</label>
                            <input type="file" class="form-control" id="propertyImages" multiple accept="image/*">
                            <small class="text-muted">You can select multiple images. Maximum file size: 5 MB per image.</small>
                        </div>
                        
                        <div class="mb-3">
                            <label for="propertyDocuments" class="form-label">Documents</label>
                            <input type="file" class="form-control" id="propertyDocuments" multiple>
                            <small class="text-muted">Upload blueprints, floor plans, certificates, etc. Maximum file size: 10 MB per file.</small>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                        <a href="/properties" class="btn btn-outline-secondary">Cancel</a>
                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle"></i> Save Property
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
