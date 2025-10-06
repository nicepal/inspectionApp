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
            <a href="/inspections" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Back to Inspections
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
                        <h5 class="border-bottom pb-2 mb-3">Property & Client Information</h5>
                        
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="property" class="form-label">Select Property <span class="text-danger">*</span></label>
                                <select class="form-select" id="property" required>
                                    <option value="">Choose a property...</option>
                                    <option value="1">Sunset Plaza Complex - 123 Main St, Los Angeles</option>
                                    <option value="2">Green Valley Apartments - 456 Oak Ave, San Diego</option>
                                    <option value="3">Downtown Office Tower - 789 Business Blvd, San Francisco</option>
                                    <option value="4">Riverside Industrial Park - 321 River Rd, Sacramento</option>
                                    <option value="5">Marina Bay Residences - 555 Bay St, Oakland</option>
                                    <option value="6">Harbor View Complex - 888 Harbor Dr, Long Beach</option>
                                </select>
                                <small class="text-muted">Don't see the property? <a href="/properties/add">Add a new property</a></small>
                            </div>
                            
                            <div class="col-md-12">
                                <label for="client" class="form-label">Client Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="client" value="ABC Corporation" readonly>
                                <small class="text-muted">Auto-filled based on selected property</small>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5 class="border-bottom pb-2 mb-3">Inspection Details</h5>
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="inspectionType" class="form-label">Inspection Type <span class="text-danger">*</span></label>
                                <select class="form-select" id="inspectionType" required>
                                    <option value="">Select Type</option>
                                    <option value="fire-safety">Fire Safety</option>
                                    <option value="structural">Structural</option>
                                    <option value="compliance">Compliance</option>
                                    <option value="safety-audit">Safety Audit</option>
                                    <option value="electrical">Electrical</option>
                                    <option value="plumbing">Plumbing</option>
                                    <option value="hvac">HVAC</option>
                                    <option value="environmental">Environmental</option>
                                </select>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="inspector" class="form-label">Select Inspector <span class="text-danger">*</span></label>
                                <select class="form-select" id="inspector" required>
                                    <option value="">Choose an inspector...</option>
                                    <option value="1">John Smith - Fire Safety Specialist</option>
                                    <option value="2">Sarah Johnson - Structural Engineer</option>
                                    <option value="3">Michael Brown - Compliance Inspector</option>
                                    <option value="4">Emily Davis - Safety Auditor</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5 class="border-bottom pb-2 mb-3">Schedule</h5>
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="inspectionDate" class="form-label">Inspection Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="inspectionDate" required>
                            </div>
                            
                            <div class="col-md-3">
                                <label for="startTime" class="form-label">Start Time <span class="text-danger">*</span></label>
                                <input type="time" class="form-control" id="startTime" required>
                            </div>
                            
                            <div class="col-md-3">
                                <label for="endTime" class="form-label">End Time <span class="text-danger">*</span></label>
                                <input type="time" class="form-control" id="endTime" required>
                            </div>
                            
                            <div class="col-md-12">
                                <label for="timezone" class="form-label">Timezone</label>
                                <select class="form-select" id="timezone">
                                    <option value="PST">Pacific Standard Time (PST)</option>
                                    <option value="MST">Mountain Standard Time (MST)</option>
                                    <option value="CST">Central Standard Time (CST)</option>
                                    <option value="EST">Eastern Standard Time (EST)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5 class="border-bottom pb-2 mb-3">Inspector Availability</h5>
                        
                        <div class="alert alert-info d-flex align-items-center">
                            <i class="bi bi-info-circle fs-4 me-3"></i>
                            <div>
                                <strong>Inspector Available</strong><br>
                                John Smith is available on the selected date and time.
                            </div>
                        </div>
                        
                        <div class="card bg-light">
                            <div class="card-body">
                                <h6 class="mb-3">Available Time Slots for Selected Date:</h6>
                                <div class="d-flex flex-wrap gap-2">
                                    <button type="button" class="btn btn-sm btn-outline-primary">8:00 AM - 10:00 AM</button>
                                    <button type="button" class="btn btn-sm btn-outline-primary">10:00 AM - 12:00 PM</button>
                                    <button type="button" class="btn btn-sm btn-outline-primary">1:00 PM - 3:00 PM</button>
                                    <button type="button" class="btn btn-sm btn-outline-primary">3:00 PM - 5:00 PM</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5 class="border-bottom pb-2 mb-3">Additional Information</h5>
                        
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="notes" class="form-label">Special Instructions / Notes</label>
                                <textarea class="form-control" id="notes" rows="4" placeholder="Enter any special instructions, access codes, or important notes for the inspector..."></textarea>
                            </div>
                            
                            <div class="col-md-12">
                                <label for="preInspectionDocs" class="form-label">Pre-Inspection Documents (Optional)</label>
                                <input type="file" class="form-control" id="preInspectionDocs" multiple>
                                <small class="text-muted">Upload any relevant documents, previous reports, or floor plans that might be helpful for the inspection.</small>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5 class="border-bottom pb-2 mb-3">Notifications</h5>
                        
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="notifyInspector" checked>
                            <label class="form-check-label" for="notifyInspector">
                                Send notification to inspector
                            </label>
                        </div>
                        
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="notifyClient" checked>
                            <label class="form-check-label" for="notifyClient">
                                Send notification to client
                            </label>
                        </div>
                        
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="reminderDay">
                            <label class="form-check-label" for="reminderDay">
                                Send reminder 1 day before inspection
                            </label>
                        </div>
                        
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="reminderHour">
                            <label class="form-check-label" for="reminderHour">
                                Send reminder 1 hour before inspection
                            </label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                        <a href="/inspections" class="btn btn-outline-secondary">Cancel</a>
                        <button type="button" class="btn btn-outline-primary">Save as Draft</button>
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

@section('scripts')
<script>
    document.getElementById('property').addEventListener('change', function() {
        const clientNames = {
            '1': 'ABC Corporation',
            '2': 'Property Holdings Inc',
            '3': 'Tech Ventures LLC',
            '4': 'Manufacturing Co',
            '5': 'Coastal Properties',
            '6': 'Harbor Developments'
        };
        
        const clientInput = document.getElementById('client');
        clientInput.value = clientNames[this.value] || '';
    });
</script>
@endsection
