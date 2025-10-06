@extends('layout')

@section('title', 'Property Details - Inspection Management System')
@section('properties-active', 'active')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Sunset Plaza Complex</h1>
        <p class="text-muted"><i class="bi bi-geo-alt"></i> 123 Main St, Los Angeles, CA 90001</p>
    </div>
    <div>
        <a href="/properties" class="btn btn-outline-secondary me-2">
            <i class="bi bi-arrow-left"></i> Back to Properties
        </a>
        <a href="/properties/1/edit" class="btn btn-primary">
            <i class="bi bi-pencil"></i> Edit Property
        </a>
        <button class="btn btn-outline-danger ms-2">
            <i class="bi bi-trash"></i> Delete
        </button>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">General Property Information</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="text-muted small">Property Name</label>
                        <p class="fw-bold">Sunset Plaza Complex</p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Property Type</label>
                        <p><span class="badge bg-primary">Commercial</span></p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Client Name</label>
                        <p class="fw-bold">ABC Corporation</p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Contact Details</label>
                        <p>
                            <i class="bi bi-telephone"></i> (555) 123-4567<br>
                            <i class="bi bi-envelope"></i> contact@abccorp.com
                        </p>
                    </div>
                    <div class="col-md-12">
                        <label class="text-muted small">Property Address</label>
                        <p>123 Main Street, Los Angeles, CA 90001, United States</p>
                    </div>
                    <div class="col-md-3">
                        <label class="text-muted small">Building Size</label>
                        <p class="fw-bold">45,000 Sq. Ft</p>
                    </div>
                    <div class="col-md-3">
                        <label class="text-muted small">Number of Floors</label>
                        <p class="fw-bold">8 Floors</p>
                    </div>
                    <div class="col-md-3">
                        <label class="text-muted small">Number of Rooms</label>
                        <p class="fw-bold">156 Rooms</p>
                    </div>
                    <div class="col-md-3">
                        <label class="text-muted small">Year Built</label>
                        <p class="fw-bold">2018</p>
                    </div>
                    <div class="col-md-12">
                        <label class="text-muted small">Additional Notes</label>
                        <p>Modern commercial complex with retail spaces on ground floor and office spaces on upper floors. Features include underground parking, rooftop terrace, and state-of-the-art HVAC system. Recently underwent facade renovation.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Inspection History</h5>
                <a href="/inspections/schedule?property=1" class="btn btn-sm btn-primary">
                    <i class="bi bi-calendar-plus"></i> Schedule New Inspection
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Date</th>
                                <th>Inspector</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Report</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Sep 15, 2025</td>
                                <td>John Smith</td>
                                <td><span class="badge bg-primary">Fire Safety</span></td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-download"></i> Download
                                    </a>
                                    <a href="/inspections/15" class="btn btn-sm btn-outline-secondary">
                                        <i class="bi bi-eye"></i> View
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Jul 20, 2025</td>
                                <td>Sarah Johnson</td>
                                <td><span class="badge bg-success">Structural</span></td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-download"></i> Download
                                    </a>
                                    <a href="/inspections/12" class="btn btn-sm btn-outline-secondary">
                                        <i class="bi bi-eye"></i> View
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>May 10, 2025</td>
                                <td>Michael Brown</td>
                                <td><span class="badge bg-info">Compliance</span></td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-download"></i> Download
                                    </a>
                                    <a href="/inspections/8" class="btn btn-sm btn-outline-secondary">
                                        <i class="bi bi-eye"></i> View
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Mar 5, 2025</td>
                                <td>Emily Davis</td>
                                <td><span class="badge bg-danger">Safety Audit</span></td>
                                <td><span class="badge bg-warning">Follow-up Required</span></td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-download"></i> Download
                                    </a>
                                    <a href="/inspections/5" class="btn btn-sm btn-outline-secondary">
                                        <i class="bi bi-eye"></i> View
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-white">
                <h5 class="mb-0">Upcoming Inspections</h5>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center p-3 border rounded mb-3">
                    <div>
                        <h6 class="mb-1">Fire Safety Inspection</h6>
                        <p class="text-muted mb-0">
                            <i class="bi bi-calendar3"></i> October 8, 2025 at 10:00 AM<br>
                            <i class="bi bi-person"></i> Inspector: John Smith
                        </p>
                    </div>
                    <div>
                        <span class="badge bg-warning">Scheduled</span>
                        <div class="mt-2">
                            <button class="btn btn-sm btn-outline-primary">Reschedule</button>
                            <a href="/inspections/20" class="btn btn-sm btn-outline-secondary">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Property Status</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="text-muted small">Current Status</label>
                    <p><span class="badge bg-success fs-6">Completed</span></p>
                </div>
                <div class="mb-3">
                    <label class="text-muted small">Last Inspection</label>
                    <p class="fw-bold">September 15, 2025</p>
                </div>
                <div class="mb-3">
                    <label class="text-muted small">Next Scheduled</label>
                    <p class="fw-bold">October 8, 2025</p>
                </div>
                <div class="mb-0">
                    <label class="text-muted small">Assigned Inspector</label>
                    <p class="fw-bold">John Smith</p>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Attachments & Media</h5>
                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#uploadModal">
                    <i class="bi bi-upload"></i> Upload
                </button>
            </div>
            <div class="card-body">
                <div class="mb-3 p-2 border rounded">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-image text-primary fs-4 me-3"></i>
                        <div class="flex-grow-1">
                            <p class="mb-0 fw-bold">Building Exterior.jpg</p>
                            <small class="text-muted">2.4 MB</small>
                        </div>
                        <div>
                            <button class="btn btn-sm btn-link"><i class="bi bi-download"></i></button>
                            <button class="btn btn-sm btn-link text-danger"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                </div>
                <div class="mb-3 p-2 border rounded">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-file-pdf text-danger fs-4 me-3"></i>
                        <div class="flex-grow-1">
                            <p class="mb-0 fw-bold">Safety Report Q3.pdf</p>
                            <small class="text-muted">1.8 MB</small>
                        </div>
                        <div>
                            <button class="btn btn-sm btn-link"><i class="bi bi-download"></i></button>
                            <button class="btn btn-sm btn-link text-danger"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                </div>
                <div class="mb-3 p-2 border rounded">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-file-earmark text-info fs-4 me-3"></i>
                        <div class="flex-grow-1">
                            <p class="mb-0 fw-bold">Floor Plans.dwg</p>
                            <small class="text-muted">5.2 MB</small>
                        </div>
                        <div>
                            <button class="btn btn-sm btn-link"><i class="bi bi-download"></i></button>
                            <button class="btn btn-sm btn-link text-danger"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                </div>
                <div class="p-2 border rounded">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-file-word text-primary fs-4 me-3"></i>
                        <div class="flex-grow-1">
                            <p class="mb-0 fw-bold">Structural Analysis.docx</p>
                            <small class="text-muted">980 KB</small>
                        </div>
                        <div>
                            <button class="btn btn-sm btn-link"><i class="bi bi-download"></i></button>
                            <button class="btn btn-sm btn-link text-danger"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-white">
                <h5 class="mb-0">Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="/inspections/schedule?property=1" class="btn btn-primary">
                        <i class="bi bi-calendar-plus"></i> Schedule Inspection
                    </a>
                    <a href="/properties/1/edit" class="btn btn-outline-primary">
                        <i class="bi bi-pencil"></i> Edit Details
                    </a>
                    <a href="/reports?property=1" class="btn btn-outline-primary">
                        <i class="bi bi-file-earmark-text"></i> View All Reports
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="uploadModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Files</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Select Files</label>
                    <input type="file" class="form-control" multiple>
                    <small class="text-muted">Maximum file size: 10 MB</small>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description (Optional)</label>
                    <textarea class="form-control" rows="3"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Upload</button>
            </div>
        </div>
    </div>
</div>
@endsection
