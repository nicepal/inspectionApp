@extends('layout')

@section('title', 'Inspections - Inspection Management System')
@section('inspections-active', 'active')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Inspections</h1>
        <p class="text-muted">Track and manage all property inspections</p>
    </div>
    <div>
        <a href="/inspections/schedule" class="btn btn-primary">
            <i class="bi bi-calendar-plus"></i> Schedule New Inspection
        </a>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card stat-card primary">
            <div class="card-body">
                <h6 class="text-muted mb-2">Total Inspections</h6>
                <h3 class="mb-0">348</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card success">
            <div class="card-body">
                <h6 class="text-muted mb-2">Completed This Month</h6>
                <h3 class="mb-0">42</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card warning">
            <div class="card-body">
                <h6 class="text-muted mb-2">Pending Inspections</h6>
                <h3 class="mb-0">23</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card danger">
            <div class="card-body">
                <h6 class="text-muted mb-2">Upcoming Inspections</h6>
                <h3 class="mb-0">15</h3>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search inspections...">
                </div>
            </div>
            <div class="col-md-2">
                <select class="form-select">
                    <option selected>Status</option>
                    <option>Scheduled</option>
                    <option>In Progress</option>
                    <option>Completed</option>
                    <option>Requires Follow-up</option>
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-select">
                    <option selected>Inspection Type</option>
                    <option>Fire Safety</option>
                    <option>Structural</option>
                    <option>Compliance</option>
                    <option>Safety Audit</option>
                    <option>Electrical</option>
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-select">
                    <option selected>Inspector</option>
                    <option>John Smith</option>
                    <option>Sarah Johnson</option>
                    <option>Michael Brown</option>
                    <option>Emily Davis</option>
                </select>
            </div>
            <div class="col-md-2">
                <input type="date" class="form-control" placeholder="Date">
            </div>
            <div class="col-md-1">
                <button class="btn btn-outline-secondary w-100">
                    <i class="bi bi-arrow-clockwise"></i>
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Property Name</th>
                        <th>Client</th>
                        <th>Type</th>
                        <th>Inspector</th>
                        <th>Date & Time</th>
                        <th>Inspection Status</th>
                        <th>Report Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>#INS-348</strong></td>
                        <td>
                            <strong>Sunset Plaza Complex</strong><br>
                            <small class="text-muted">123 Main St, Los Angeles</small>
                        </td>
                        <td>ABC Corporation</td>
                        <td><span class="badge bg-primary">Fire Safety</span></td>
                        <td>John Smith</td>
                        <td>
                            Oct 8, 2025<br>
                            <small class="text-muted">10:00 AM</small>
                        </td>
                        <td><span class="badge bg-warning">Scheduled</span></td>
                        <td><span class="badge bg-secondary">Pending</span></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/inspections/348" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="/inspections/348/edit" class="btn btn-outline-secondary" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button class="btn btn-outline-info" title="Reschedule">
                                    <i class="bi bi-calendar"></i>
                                </button>
                                <button class="btn btn-outline-danger" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>#INS-347</strong></td>
                        <td>
                            <strong>Green Valley Apartments</strong><br>
                            <small class="text-muted">456 Oak Ave, San Diego</small>
                        </td>
                        <td>Property Holdings Inc</td>
                        <td><span class="badge bg-success">Structural</span></td>
                        <td>Sarah Johnson</td>
                        <td>
                            Oct 9, 2025<br>
                            <small class="text-muted">2:00 PM</small>
                        </td>
                        <td><span class="badge bg-warning">Scheduled</span></td>
                        <td><span class="badge bg-secondary">Pending</span></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/inspections/347" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="/inspections/347/edit" class="btn btn-outline-secondary" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button class="btn btn-outline-info" title="Reschedule">
                                    <i class="bi bi-calendar"></i>
                                </button>
                                <button class="btn btn-outline-danger" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>#INS-346</strong></td>
                        <td>
                            <strong>Harbor View Complex</strong><br>
                            <small class="text-muted">888 Harbor Dr, Long Beach</small>
                        </td>
                        <td>Harbor Developments</td>
                        <td><span class="badge bg-info">Compliance</span></td>
                        <td>Michael Brown</td>
                        <td>
                            Oct 5, 2025<br>
                            <small class="text-muted">11:30 AM</small>
                        </td>
                        <td><span class="badge bg-success">Completed</span></td>
                        <td><span class="badge bg-success">Completed</span></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/inspections/346" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="#" class="btn btn-outline-success" title="Download Report">
                                    <i class="bi bi-download"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>#INS-345</strong></td>
                        <td>
                            <strong>Downtown Office Tower</strong><br>
                            <small class="text-muted">789 Business Blvd, San Francisco</small>
                        </td>
                        <td>Tech Ventures LLC</td>
                        <td><span class="badge bg-danger">Safety Audit</span></td>
                        <td>Emily Davis</td>
                        <td>
                            Oct 10, 2025<br>
                            <small class="text-muted">9:30 AM</small>
                        </td>
                        <td><span class="badge bg-warning">Scheduled</span></td>
                        <td><span class="badge bg-secondary">Pending</span></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/inspections/345" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="/inspections/345/edit" class="btn btn-outline-secondary" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button class="btn btn-outline-info" title="Reschedule">
                                    <i class="bi bi-calendar"></i>
                                </button>
                                <button class="btn btn-outline-danger" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>#INS-344</strong></td>
                        <td>
                            <strong>Riverside Industrial Park</strong><br>
                            <small class="text-muted">321 River Rd, Sacramento</small>
                        </td>
                        <td>Manufacturing Co</td>
                        <td><span class="badge bg-primary">Fire Safety</span></td>
                        <td>John Smith</td>
                        <td>
                            Oct 3, 2025<br>
                            <small class="text-muted">3:00 PM</small>
                        </td>
                        <td><span class="badge bg-primary">In Progress</span></td>
                        <td><span class="badge bg-warning">Draft</span></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/inspections/344" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="/inspections/344/edit" class="btn btn-outline-secondary" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>#INS-343</strong></td>
                        <td>
                            <strong>Marina Bay Residences</strong><br>
                            <small class="text-muted">555 Bay St, Oakland</small>
                        </td>
                        <td>Coastal Properties</td>
                        <td><span class="badge bg-success">Structural</span></td>
                        <td>Sarah Johnson</td>
                        <td>
                            Oct 12, 2025<br>
                            <small class="text-muted">1:00 PM</small>
                        </td>
                        <td><span class="badge bg-warning">Scheduled</span></td>
                        <td><span class="badge bg-secondary">Pending</span></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/inspections/343" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="/inspections/343/edit" class="btn btn-outline-secondary" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button class="btn btn-outline-info" title="Reschedule">
                                    <i class="bi bi-calendar"></i>
                                </button>
                                <button class="btn btn-outline-danger" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>#INS-342</strong></td>
                        <td>
                            <strong>Westside Mall</strong><br>
                            <small class="text-muted">222 West Ave, Pasadena</small>
                        </td>
                        <td>Retail Group Inc</td>
                        <td><span class="badge bg-info">Compliance</span></td>
                        <td>Michael Brown</td>
                        <td>
                            Sep 28, 2025<br>
                            <small class="text-muted">4:30 PM</small>
                        </td>
                        <td><span class="badge bg-danger">Requires Follow-up</span></td>
                        <td><span class="badge bg-success">Completed</span></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/inspections/342" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="#" class="btn btn-outline-success" title="Download Report">
                                    <i class="bi bi-download"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>#INS-341</strong></td>
                        <td>
                            <strong>Skyline Plaza</strong><br>
                            <small class="text-muted">777 Sky Way, San Jose</small>
                        </td>
                        <td>Skyline Holdings</td>
                        <td><span class="badge bg-danger">Safety Audit</span></td>
                        <td>Emily Davis</td>
                        <td>
                            Oct 15, 2025<br>
                            <small class="text-muted">10:00 AM</small>
                        </td>
                        <td><span class="badge bg-warning">Scheduled</span></td>
                        <td><span class="badge bg-secondary">Pending</span></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/inspections/341" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="/inspections/341/edit" class="btn btn-outline-secondary" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button class="btn btn-outline-info" title="Reschedule">
                                    <i class="bi bi-calendar"></i>
                                </button>
                                <button class="btn btn-outline-danger" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <div>
                <span class="text-muted">Showing 1 to 8 of 348 inspections</span>
            </div>
            <nav>
                <ul class="pagination mb-0">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection
