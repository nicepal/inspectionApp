@extends('layout')

@section('title', 'Inspection Details - Inspection Management System')
@section('inspections-active', 'active')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Inspection #INS-348</h1>
        <p class="text-muted">Fire Safety Inspection - Sunset Plaza Complex</p>
    </div>
    <div>
        <a href="/inspections" class="btn btn-outline-secondary me-2">
            <i class="bi bi-arrow-left"></i> Back to Inspections
        </a>
        <button class="btn btn-outline-info me-2">
            <i class="bi bi-calendar"></i> Reschedule
        </button>
        <a href="/inspections/348/edit" class="btn btn-primary">
            <i class="bi bi-pencil"></i> Edit
        </a>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">General Inspection Information</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="text-muted small">Inspection ID</label>
                        <p class="fw-bold">#INS-348</p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Inspection Type</label>
                        <p><span class="badge bg-primary fs-6">Fire Safety</span></p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Property Name</label>
                        <p class="fw-bold">
                            <a href="/properties/1" class="text-decoration-none">Sunset Plaza Complex</a><br>
                            <small class="text-muted">123 Main St, Los Angeles, CA 90001</small>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Client</label>
                        <p class="fw-bold">
                            <a href="/clients/1" class="text-decoration-none">ABC Corporation</a><br>
                            <small class="text-muted"><i class="bi bi-telephone"></i> (555) 123-4567</small>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Inspector Assigned</label>
                        <p class="fw-bold">John Smith</p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Date & Time</label>
                        <p class="fw-bold">
                            <i class="bi bi-calendar3"></i> October 8, 2025<br>
                            <i class="bi bi-clock"></i> 10:00 AM - 12:00 PM
                        </p>
                    </div>
                    <div class="col-md-12">
                        <label class="text-muted small">Inspection Notes</label>
                        <p>Pre-inspection checklist includes all fire safety equipment, emergency exits, sprinkler systems, and fire alarms. Special attention required for rooftop emergency exit compliance.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Inspection Checklist</h5>
            </div>
            <div class="card-body">
                <div class="accordion" id="checklistAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#fireAlarms">
                                <strong>Fire Alarm System</strong>
                                <span class="badge bg-success ms-2">5/5 Passed</span>
                            </button>
                        </h2>
                        <div id="fireAlarms" class="accordion-collapse collapse show" data-bs-parent="#checklistAccordion">
                            <div class="accordion-body">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th width="50%">Checkpoint</th>
                                            <th width="15%">Status</th>
                                            <th width="35%">Comments</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Control panel operational</td>
                                            <td><span class="badge bg-success">Pass</span></td>
                                            <td>All systems functioning properly</td>
                                        </tr>
                                        <tr>
                                            <td>Smoke detectors functional</td>
                                            <td><span class="badge bg-success">Pass</span></td>
                                            <td>All 48 units tested and operational</td>
                                        </tr>
                                        <tr>
                                            <td>Manual pull stations accessible</td>
                                            <td><span class="badge bg-success">Pass</span></td>
                                            <td>All stations clearly marked</td>
                                        </tr>
                                        <tr>
                                            <td>Alarm audibility test</td>
                                            <td><span class="badge bg-success">Pass</span></td>
                                            <td>Alarms audible throughout building</td>
                                        </tr>
                                        <tr>
                                            <td>Battery backup operational</td>
                                            <td><span class="badge bg-success">Pass</span></td>
                                            <td>48-hour backup confirmed</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sprinklers">
                                <strong>Sprinkler System</strong>
                                <span class="badge bg-success ms-2">4/4 Passed</span>
                            </button>
                        </h2>
                        <div id="sprinklers" class="accordion-collapse collapse" data-bs-parent="#checklistAccordion">
                            <div class="accordion-body">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th width="50%">Checkpoint</th>
                                            <th width="15%">Status</th>
                                            <th width="35%">Comments</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Water pressure adequate</td>
                                            <td><span class="badge bg-success">Pass</span></td>
                                            <td>Pressure at 120 PSI</td>
                                        </tr>
                                        <tr>
                                            <td>Sprinkler heads clear</td>
                                            <td><span class="badge bg-success">Pass</span></td>
                                            <td>No obstructions found</td>
                                        </tr>
                                        <tr>
                                            <td>Control valves accessible</td>
                                            <td><span class="badge bg-success">Pass</span></td>
                                            <td>All valves properly labeled</td>
                                        </tr>
                                        <tr>
                                            <td>Flow test completed</td>
                                            <td><span class="badge bg-success">Pass</span></td>
                                            <td>System flow rate verified</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#emergencyExits">
                                <strong>Emergency Exits</strong>
                                <span class="badge bg-warning ms-2">5/6 Passed</span>
                            </button>
                        </h2>
                        <div id="emergencyExits" class="accordion-collapse collapse" data-bs-parent="#checklistAccordion">
                            <div class="accordion-body">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th width="50%">Checkpoint</th>
                                            <th width="15%">Status</th>
                                            <th width="35%">Comments</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Exit signs illuminated</td>
                                            <td><span class="badge bg-success">Pass</span></td>
                                            <td>All exit signs functioning</td>
                                        </tr>
                                        <tr>
                                            <td>Exit routes clear</td>
                                            <td><span class="badge bg-success">Pass</span></td>
                                            <td>No obstructions in pathways</td>
                                        </tr>
                                        <tr>
                                            <td>Emergency lighting functional</td>
                                            <td><span class="badge bg-success">Pass</span></td>
                                            <td>90-minute battery backup verified</td>
                                        </tr>
                                        <tr>
                                            <td>Doors open outward</td>
                                            <td><span class="badge bg-success">Pass</span></td>
                                            <td>All doors comply with code</td>
                                        </tr>
                                        <tr>
                                            <td>Panic hardware operational</td>
                                            <td><span class="badge bg-success">Pass</span></td>
                                            <td>Push bars functioning properly</td>
                                        </tr>
                                        <tr>
                                            <td>Rooftop exit accessibility</td>
                                            <td><span class="badge bg-danger">Fail</span></td>
                                            <td>
                                                <strong class="text-danger">Needs Repair:</strong> Rooftop exit door lock mechanism requires replacement. Non-compliant with emergency access requirements.
                                                <div class="mt-2">
                                                    <img src="https://via.placeholder.com/300x200" class="img-thumbnail" alt="Evidence">
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#fireExtinguishers">
                                <strong>Fire Extinguishers</strong>
                                <span class="badge bg-success ms-2">3/3 Passed</span>
                            </button>
                        </h2>
                        <div id="fireExtinguishers" class="accordion-collapse collapse" data-bs-parent="#checklistAccordion">
                            <div class="accordion-body">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th width="50%">Checkpoint</th>
                                            <th width="15%">Status</th>
                                            <th width="35%">Comments</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Proper placement</td>
                                            <td><span class="badge bg-success">Pass</span></td>
                                            <td>All units within 75 ft travel distance</td>
                                        </tr>
                                        <tr>
                                            <td>Inspection tags current</td>
                                            <td><span class="badge bg-success">Pass</span></td>
                                            <td>All tags dated within last 12 months</td>
                                        </tr>
                                        <tr>
                                            <td>Pressure gauges normal</td>
                                            <td><span class="badge bg-success">Pass</span></td>
                                            <td>All units in green zone</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Inspection Report</h5>
                <button class="btn btn-sm btn-primary">
                    <i class="bi bi-file-earmark-pdf"></i> Generate PDF Report
                </button>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="text-muted small">Inspection Summary</label>
                    <p>Overall fire safety inspection completed for Sunset Plaza Complex. Property demonstrates strong compliance with fire safety regulations. One critical issue identified requiring immediate attention.</p>
                </div>
                
                <div class="mb-3">
                    <label class="text-muted small">Pass/Fail Status</label>
                    <p><span class="badge bg-warning fs-6">Conditional Pass - Requires Follow-up</span></p>
                </div>

                <div class="mb-3">
                    <label class="text-muted small">Detailed Observations</label>
                    <ul>
                        <li>Fire alarm system fully operational with all detectors tested and verified</li>
                        <li>Sprinkler system maintains adequate pressure and coverage throughout building</li>
                        <li>Emergency exit signage and lighting meets all code requirements</li>
                        <li><strong class="text-danger">Critical Issue:</strong> Rooftop emergency exit door lock mechanism is non-compliant and must be replaced within 30 days</li>
                        <li>Fire extinguisher maintenance is current and all units are properly charged</li>
                    </ul>
                </div>

                <div class="mb-0">
                    <label class="text-muted small">Recommendations for Improvements</label>
                    <ol>
                        <li><strong>Immediate Action Required:</strong> Replace rooftop exit door lock mechanism with panic hardware compliant with current fire codes (Est. completion: Within 30 days)</li>
                        <li>Consider upgrading to addressable fire alarm system for enhanced monitoring capabilities</li>
                        <li>Schedule quarterly sprinkler system maintenance to ensure continued optimal performance</li>
                        <li>Implement monthly fire drill procedures for all building occupants</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Inspection Status</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="text-muted small">Current Status</label>
                    <p><span class="badge bg-warning fs-6">Scheduled</span></p>
                </div>
                <div class="mb-3">
                    <label class="text-muted small">Report Status</label>
                    <p><span class="badge bg-secondary fs-6">Pending</span></p>
                </div>
                <div class="mb-3">
                    <label class="text-muted small">Created On</label>
                    <p>September 25, 2025</p>
                </div>
                <div class="mb-0">
                    <label class="text-muted small">Last Updated</label>
                    <p>October 1, 2025</p>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Inspector Details</h5>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                        <i class="bi bi-person fs-4"></i>
                    </div>
                    <div>
                        <h6 class="mb-0">John Smith</h6>
                        <small class="text-muted">Fire Safety Inspector</small>
                    </div>
                </div>
                <p class="mb-2">
                    <i class="bi bi-envelope"></i> john.smith@inspection.com
                </p>
                <p class="mb-0">
                    <i class="bi bi-telephone"></i> (555) 987-6543
                </p>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Uploaded Evidence</h5>
            </div>
            <div class="card-body">
                <div class="row g-2">
                    <div class="col-6">
                        <img src="https://via.placeholder.com/150" class="img-thumbnail" alt="Evidence 1">
                    </div>
                    <div class="col-6">
                        <img src="https://via.placeholder.com/150" class="img-thumbnail" alt="Evidence 2">
                    </div>
                    <div class="col-6">
                        <img src="https://via.placeholder.com/150" class="img-thumbnail" alt="Evidence 3">
                    </div>
                    <div class="col-6">
                        <img src="https://via.placeholder.com/150" class="img-thumbnail" alt="Evidence 4">
                    </div>
                </div>
                <button class="btn btn-outline-primary btn-sm w-100 mt-3">
                    <i class="bi bi-upload"></i> Upload More
                </button>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-white">
                <h5 class="mb-0">Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <button class="btn btn-primary">
                        <i class="bi bi-check-circle"></i> Mark as Completed
                    </button>
                    <button class="btn btn-outline-info">
                        <i class="bi bi-calendar"></i> Reschedule
                    </button>
                    <a href="/inspections/348/edit" class="btn btn-outline-primary">
                        <i class="bi bi-pencil"></i> Edit Details
                    </a>
                    <button class="btn btn-outline-success">
                        <i class="bi bi-download"></i> Download Report
                    </button>
                    <button class="btn btn-outline-danger">
                        <i class="bi bi-trash"></i> Delete Inspection
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
