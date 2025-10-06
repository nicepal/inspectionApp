@extends('layout')

@section('title', 'Reports - Inspection Management System')
@section('reports-active', 'active')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Inspection Reports</h1>
        <p class="text-muted">View and manage all inspection reports</p>
    </div>
    <div>
        <button class="btn btn-outline-primary me-2">
            <i class="bi bi-download"></i> Export Reports
        </button>
        <a href="/reports/generate" class="btn btn-primary">
            <i class="bi bi-file-earmark-plus"></i> Generate Report
        </a>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card stat-card primary">
            <div class="card-body">
                <h6 class="text-muted mb-2">Total Reports</h6>
                <h3 class="mb-0">312</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card success">
            <div class="card-body">
                <h6 class="text-muted mb-2">Completed</h6>
                <h3 class="mb-0">287</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card warning">
            <div class="card-body">
                <h6 class="text-muted mb-2">Pending</h6>
                <h3 class="mb-0">18</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card info">
            <div class="card-body">
                <h6 class="text-muted mb-2">Drafts</h6>
                <h3 class="mb-0">7</h3>
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
                    <input type="text" class="form-control" placeholder="Search reports...">
                </div>
            </div>
            <div class="col-md-2">
                <select class="form-select">
                    <option selected>Report Type</option>
                    <option>Fire Safety</option>
                    <option>Structural</option>
                    <option>Compliance</option>
                    <option>Safety Audit</option>
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-select">
                    <option selected>Status</option>
                    <option>Completed</option>
                    <option>Pending</option>
                    <option>Draft</option>
                </select>
            </div>
            <div class="col-md-2">
                <input type="date" class="form-control" placeholder="Date">
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
                        <th>Report ID</th>
                        <th>Property</th>
                        <th>Inspection Type</th>
                        <th>Inspector</th>
                        <th>Date Generated</th>
                        <th>Result</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>#RPT-346</strong></td>
                        <td>
                            Harbor View Complex<br>
                            <small class="text-muted">888 Harbor Dr, Long Beach</small>
                        </td>
                        <td><span class="badge bg-info">Compliance</span></td>
                        <td>Michael Brown</td>
                        <td>Oct 5, 2025</td>
                        <td><span class="badge bg-success">Pass</span></td>
                        <td><span class="badge bg-success">Completed</span></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/reports/346" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <button class="btn btn-outline-success" title="Download">
                                    <i class="bi bi-download"></i>
                                </button>
                                <button class="btn btn-outline-secondary" title="Share">
                                    <i class="bi bi-share"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>#RPT-345</strong></td>
                        <td>
                            Sunset Plaza Complex<br>
                            <small class="text-muted">123 Main St, Los Angeles</small>
                        </td>
                        <td><span class="badge bg-primary">Fire Safety</span></td>
                        <td>John Smith</td>
                        <td>Sep 15, 2025</td>
                        <td><span class="badge bg-warning">Conditional</span></td>
                        <td><span class="badge bg-success">Completed</span></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/reports/345" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <button class="btn btn-outline-success" title="Download">
                                    <i class="bi bi-download"></i>
                                </button>
                                <button class="btn btn-outline-secondary" title="Share">
                                    <i class="bi bi-share"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>#RPT-344</strong></td>
                        <td>
                            Riverside Industrial Park<br>
                            <small class="text-muted">321 River Rd, Sacramento</small>
                        </td>
                        <td><span class="badge bg-primary">Fire Safety</span></td>
                        <td>John Smith</td>
                        <td>Oct 3, 2025</td>
                        <td><span class="badge bg-success">Pass</span></td>
                        <td><span class="badge bg-warning">Draft</span></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/reports/344" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="/reports/344/edit" class="btn btn-outline-secondary" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button class="btn btn-outline-danger" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>#RPT-343</strong></td>
                        <td>
                            Westside Mall<br>
                            <small class="text-muted">222 West Ave, Pasadena</small>
                        </td>
                        <td><span class="badge bg-info">Compliance</span></td>
                        <td>Michael Brown</td>
                        <td>Sep 28, 2025</td>
                        <td><span class="badge bg-danger">Fail</span></td>
                        <td><span class="badge bg-success">Completed</span></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/reports/343" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <button class="btn btn-outline-success" title="Download">
                                    <i class="bi bi-download"></i>
                                </button>
                                <button class="btn btn-outline-secondary" title="Share">
                                    <i class="bi bi-share"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>#RPT-342</strong></td>
                        <td>
                            Green Valley Apartments<br>
                            <small class="text-muted">456 Oak Ave, San Diego</small>
                        </td>
                        <td><span class="badge bg-success">Structural</span></td>
                        <td>Sarah Johnson</td>
                        <td>Aug 22, 2025</td>
                        <td><span class="badge bg-success">Pass</span></td>
                        <td><span class="badge bg-success">Completed</span></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/reports/342" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <button class="btn btn-outline-success" title="Download">
                                    <i class="bi bi-download"></i>
                                </button>
                                <button class="btn btn-outline-secondary" title="Share">
                                    <i class="bi bi-share"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>#RPT-341</strong></td>
                        <td>
                            Downtown Office Tower<br>
                            <small class="text-muted">789 Business Blvd, San Francisco</small>
                        </td>
                        <td><span class="badge bg-success">Structural</span></td>
                        <td>Sarah Johnson</td>
                        <td>Sep 1, 2025</td>
                        <td><span class="badge bg-success">Pass</span></td>
                        <td><span class="badge bg-secondary">Pending</span></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/reports/341" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="/reports/341/edit" class="btn btn-outline-secondary" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button class="btn btn-outline-success" title="Finalize">
                                    <i class="bi bi-check-circle"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>#RPT-340</strong></td>
                        <td>
                            Marina Bay Residences<br>
                            <small class="text-muted">555 Bay St, Oakland</small>
                        </td>
                        <td><span class="badge bg-danger">Safety Audit</span></td>
                        <td>Emily Davis</td>
                        <td>Jul 30, 2025</td>
                        <td><span class="badge bg-warning">Conditional</span></td>
                        <td><span class="badge bg-success">Completed</span></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/reports/340" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <button class="btn btn-outline-success" title="Download">
                                    <i class="bi bi-download"></i>
                                </button>
                                <button class="btn btn-outline-secondary" title="Share">
                                    <i class="bi bi-share"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>#RPT-339</strong></td>
                        <td>
                            Skyline Plaza<br>
                            <small class="text-muted">777 Sky Way, San Jose</small>
                        </td>
                        <td><span class="badge bg-info">Compliance</span></td>
                        <td>Michael Brown</td>
                        <td>Sep 10, 2025</td>
                        <td><span class="badge bg-success">Pass</span></td>
                        <td><span class="badge bg-success">Completed</span></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/reports/339" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <button class="btn btn-outline-success" title="Download">
                                    <i class="bi bi-download"></i>
                                </button>
                                <button class="btn btn-outline-secondary" title="Share">
                                    <i class="bi bi-share"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <div>
                <span class="text-muted">Showing 1 to 8 of 312 reports</span>
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
